<?php

/**
 * Class UserItemModel
 *
 * @package LearnPress/Classes
 * @version 1.0.0
 * @since 4.2.5
 */

namespace LearnPress\Models\UserItems;

use LP_Course;
use LP_Course_Cache;
use LP_User;
use LP_User_Items_Filter;
use Throwable;

class UserCourseModel extends UserItemModel {
	/**
	 * Item type Course
	 *
	 * @var string Item type
	 */
	public $item_type = LP_COURSE_CPT;
	/**
	 * Ref type Order
	 *
	 * @var string
	 */
	public $ref_type = LP_ORDER_CPT;
	/**
	 * @var LP_User|null
	 */
	public $user;
	/**
	 * @var LP_Course|null
	 */
	public $course;

	/**
	 * Get user_course from DB.
	 *
	 * @param LP_User_Items_Filter $filter
	 * @param bool $no_cache
	 * @return UserCourseModel|false
	 */
	public static function get_user_course_model_from_db( LP_User_Items_Filter $filter, bool $no_cache = true ) {
		$filter->item_type = ( new UserCourseModel )->item_type;
		$user_course       = self::get_user_item_model_from_db( $filter, $no_cache );
		if ( ! empty( $user_course ) ) {
			$user_course         = new self( $user_course );
			$user_course->course = learn_press_get_course( $user_course->item_id );
		}

		return $user_course;
	}

	/**
	 * Get user_items is child of user course.
	 *
	 * @param int $item_id
	 * @param string $item_type
	 * @return false|UserItemModel
	 */
	public function get_item_attend( int $item_id, string $item_type ) {
		$item = false;

		try {
			$filter            = new LP_User_Items_Filter();
			$filter->parent_id = $this->user_item_id;
			$filter->item_id   = $item_id;
			$filter->item_type = $item_type;
			$filter->ref_type  = $this->item_type;
			$filter->ref_id    = $this->item_id;
			$filter->user_id   = $this->user_id;
			$item              = UserItemModel::get_user_item_model_from_db( $filter );

			if ( $item ) {
				switch ( $item_type ) {
					case LP_QUIZ_CPT:
						$item = new UserQuizModel( $item );
						break;
					default:
						break;
				}

				$item = apply_filters( 'learn-press/user-course-has-item-attend', $item, $item_type, $this );
			}
		} catch ( Throwable $e ) {
			error_log( $e->getMessage() );
		}

		return $item;
	}

	public function clean_caches() {
		parent::clean_caches();
		// Clear cache total students enrolled.
		$lp_course_cache = new LP_Course_Cache( true );
		$lp_course_cache->clean_total_students_enrolled( $this->item_id );
		$lp_course_cache->clean_total_students_enrolled_or_purchased( $this->item_id );
	}
}
