<?php
// a class to handle cars in the database
// CREATE TABLE `car` (
// `id` int(11) NOT NULL,
//  `name` varchar(128) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

class Car_model extends CI_Model {

    // returns all content of the car table, ordered by name
    public function car_list() {
        return $this->db
                ->select('*') /* select anything  */
                ->from('car') /* from car  */
                ->order_by('name', 'ASC') /* order it by name, ascendant */
                ->get() /* execute the query */
                ->result_array(); /* convert result into an array */
    }
    // returns an array of the corresponding car (DB table row) 
    // with given id in parameter
    public function carWithId($id) {
        // if we wanted to return the row itself we would use ->row_array() instead
        // select * from car where id = $id
        return $this->db
                ->get_where('car', array('id' => $id))
                ->result_array();
    }

}
