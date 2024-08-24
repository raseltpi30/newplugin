<?php
// Load WordPress environment
require_once('../../../wp-load.php'); // Adjust path as needed

global $wpdb;
$table_name = $wpdb->prefix . 'transport_booking';

if(isset($_POST)){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pickup_street = $_POST['pickup_street'];
    $pickup_city = $_POST['pickup_city'];
    $pickup_state = $_POST['pickup_state'];
    $destination_street = $_POST['destination_street'];
    $destination_city = $_POST['destination_city'];
    $destination_state = $_POST['destination_state'];
    $travel_date = $_POST['travel_date'];
    $travel_time = $_POST['travel_time'];
    $service_level = $_POST['service_level'];
    $special_needs = $_POST['special_needs'];
    $unique_id = rand(111111, 999999);
    
    $inserted = $wpdb->insert(
        $table_name,
        array(
            'orderid' => $unique_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dob' => $dob,
            'phone' => $phone,
            'email' => $email,
            'pickup_street' => $pickup_street,
            'pickup_city' => $pickup_city,
            'pickup_state' => $pickup_state,
            'destination_street' => $destination_street,
            'destination_city' => $destination_city,
            'destination_state' => $destination_state,
            'travel_date' => $travel_date,
            'travel_time' => $travel_time,
            'service_level' => $service_level,
            'special_needs' => $special_needs,
            'created_at' => current_time('mysql')
        )
    );
    $id = $wpdb->insert_id;
    if ($inserted) {
        $response = array(
            'success' => true,
            'id' => $id,
            'message' => '<div class="alert alert-success">
                Order Created Successfully!
            </div>',
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'Insertion Failed!'
        );
    }
    // Send JSON response
    wp_send_json($response);
    
}