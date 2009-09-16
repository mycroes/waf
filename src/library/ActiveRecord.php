<?php
/*
    WAF Web App(lication) Framework
    Copyright (C) 2009 Michael Croes <mycroes@gmail.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * @author Michael Croes
 */

/**
 * Active record base class.
 */

/**
 * @package Db
 */
class ActiveRecord {

	/**
	 * Find operates with four different retrieval approaches:
	 *
	 * Find by id - (1), (1, 5, 6), ([5, 6, 10]). Throws RecordNotFound.
	 * Find first - Returns the first matched record or null when not found. 
	 * Find last - Returns the last matched record or null when not found.
	 * Find all - Return all records, or an empty array when there is no match.
	 *
	 * @param  [int, ...]|array|string
	 * @param  array $options
	 * @return ActiveRecord|array|null
	 */
	public static function find() {
		$args = func_get_args();
		$options = ActiveSupport::extract_options($args);
		self::validate_find_options($options);
		//self::set_readonly_option($options);

		switch (reset($args)) {
			case 'first':
				return self::_find_initial($options);
			case 'last':
				return self::_find_last($options);
			case 'all':
				return self::_find_every($options);
			default:
				return _find_from_ids($args, $options);
		}

	}

	protected static function _find_every($options) {
		
	}

	protected static function _find_from_ids($args, $options) {

	}

	protected static function _find_initial($options) {
		$options['limit'] = 1;
		return array_shift(self::_find_every($options));
	}

	protected static function _find_last($options) {

	}
	

	/**
	 * Convenience wrapper for find('first', args).
	 *
	 * You can pass in all the same arguments to this method as you can to
	 * find('first').
	 */
	public static function first() {
		return self::find('first', func_get_args());
	}

	/**
	 * Convenience wrapper for find('last', args).
	 *
	 * You can pass in all the same arguments to this method as you can to
	 * find('first').
	 */
	public static function last() {
		return self::find('last', func_get_args());
	}

}
