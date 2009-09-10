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
 * ActiveSupport class.
 */
class ActiveSupport {

	/**
	 * Extract options from argument list.
	 *
	 * If an options array is found, it is taken from the argument list and
	 * returned.
	 *
	 * @param  array &$args Argument list with possible options.
	 * @return array
	 */
	public static function extract_options(array &$args) {
		if (is_array(end($args))) {
			return array_pop($args);
		}
		return array();
	}

}
