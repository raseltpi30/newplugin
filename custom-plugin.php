<?php
/*
Plugin Name: Simple Form Plugin
Description: A plugin to display a simple form with email and name fields.
Version: 1.0
Author: Your Name
*/

// Enqueue Styles and Scripts
function simple_form_enqueue_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_script('simple-form-script', plugin_dir_url(__FILE__) . 'js/simple-form.js', array('jquery'), null, true);
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('simple-form-style', plugin_dir_url(__FILE__) . 'css/simple-form.css');
}
add_action('wp_enqueue_scripts', 'simple_form_enqueue_scripts');

// Shortcode to Display Form
function simple_form_shortcode()
{
    ob_start(); ?>
    <div class="container">
        <div class="class" id="message"></div>
        <form id="simpleForm" method="POST">
            <div class="row">
                <div class="col-lg-10 left-side">
                    <div class="form-section">
                        <h4 class="font-weight-bold">Passenger Information:</h4>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                                <div id="first_name_error" class="error">First name is required</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                                <div id="last_name_error" class="error">Last name is required</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                                <div id="dob_error" class="error">Date of birth is required</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                <div id="phone_error" class="error">Phone number is required</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <div id="email_error" class="error">Please enter a valid email address</div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4 class="font-weight-bold">Trip Information:</h4>
                        <div class="form-custom">
                            <label for="pickup_street">Where do you need to be picked Up?</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="pickup_street" name="pickup_street" placeholder="Street">
                                    <div id="pickup_street_error" class="error">Pickup street is required</div>
                                    <div id="result"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="pickup_city" name="pickup_city" placeholder="City">
                                    <div id="pickup_city_error" class="error">Pickup city is required</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="pickup_state" name="pickup_state" placeholder="State">
                                    <div id="pickup_state_error" class="error">Pickup state is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-custom">
                            <label for="destination_street">Where are you going?</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="destination_street" name="destination_street" placeholder="Street">
                                    <div id="destination_street_error" class="error">Destination street is required</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="destination_city" name="destination_city" placeholder="City">
                                    <div id="destination_city_error" class="error">Destination city is required</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="destination_state" name="destination_state" placeholder="State">
                                    <div id="destination_state_error" class="error">Destination state is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="travel_date">What time do you need to be there?</label>
                                <input type="date" class="form-control" id="travel_date" name="travel_date">
                                <div id="travel_date_error" class="error">Travel date is required</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="travel_time">&nbsp;</label>
                                <input type="time" class="form-control" id="travel_time" name="travel_time">
                                <div id="travel_time_error" class="error">Travel time is required</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service_level">Please choose the level of service requested</label>
                            <select class="form-control" id="service_level" name="service_level">
                                <option value="">Not Selected</option>

                                <option value="20" data-base-type="1">Ambulatory</option>

                                <option value="54" data-base-type="2">Wheelchair</option>

                                <option value="30" data-base-type="3">Stretcher</option>

                                <option value="52" data-base-type="2">Bariatric Wheelchair</option>

                                <option value="60" data-base-type="3">Bariatric Stretcher</option>

                                <option value="7" data-base-type="2">Bariatric Wheelchair One Way</option>

                                <option value="10" data-base-type="3">Bariatric Stretcher One Way</option>

                                <option value="9" data-base-type="2">Wheelchair One Way</option>

                                <option value="10" data-base-type="3">Stretcher One Way</option>

                                <option value="11" data-base-type="2">COVID-19 Wheelchair</option>

                                <option value="40" data-base-type="3">COVID-19 Stretcher</option>

                                <option value="22" data-base-type="1">Ambulatory One Way</option>

                                <option value="28" data-base-type="1">COVID-19 Ambulatory One Way</option>

                                <option value="26" data-base-type="2">Bariatric Wheelchair 450lbs Max
                                </option>

                                <option value="40" data-base-type="2">Homeless Shuttle</option>

                                <option value="61" data-base-type="3">Psych Gurney</option>

                                <option value="37" data-base-type="3">Bariatric lvl I Gurney 250 to 350lbs
                                </option>

                                <option value="63" data-base-type="1">COVID-19 Ambulatory Round Trip
                                </option>

                                <option value="50" data-base-type="3">Long Distance Stretcher</option>

                                <option value="30" data-base-type="2">Long Distance Wheelchair</option>

                                <option value="35" data-base-type="2">Wheelchair-Facility S/O</option>

                                <option value="25" data-base-type="1">Ambulatory-Facility S/O</option>

                                <option value="22" data-base-type="2">Bariatric WC- Facility S/O</option>

                                <option value="31" data-base-type="3">Stretcher- Facility S/O</option>

                                <option value="35" data-base-type="3">Bariatric Stretcher- Facility S/O
                                </option>

                                <option value="55" data-base-type="3">Long Distance- Bariatric Stretcher
                                </option>

                                <option value="37" data-base-type="2">Long Distance- Bariatric Wheelchair
                                </option>
                            </select>
                            <div id="service_level_error" class="error">Service level is required</div>

                        </div>
                        <div class="form-group">
                            <label for="special_needs">Please describe any special needs, requests, or notes</label>
                            <textarea class="form-control" id="special_needs" name="special_needs" placeholder="Input note here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 book-form__section p-3 d-flex justify-content-center align-items-end left-side">
                    <div class="price_details">
                        <div class="total" style="width: 150px;height:115px">
                            <div id="displayValue" style="font-size: 26px;position:relative" class="display-value">Total: $<span style="color:red">0</span>
                            <div class="loader" style="display: none;"></div>
                        </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary m-1 g-recaptcha">Submit Trip</button>
                    </div>
                </div>
            </div>
        </form>
        <div id="formMessage"></div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            function validateField(fieldId, errorId) {
                if ($(fieldId).val().trim() === '') {
                    $(errorId).show();
                } else {
                    $(errorId).hide();
                }
            }

            // On blur and change events for input fields
            $('#first_name').on('blur change', function() {
                validateField('#first_name', '#first_name_error');
            });

            $('#last_name').on('blur change', function() {
                validateField('#last_name', '#last_name_error');
            });

            $('#dob').on('blur change', function() {
                validateField('#dob', '#dob_error');
            });

            $('#phone').on('blur change', function() {
                validateField('#phone', '#phone_error');
            });

            $('#email').on('blur change', function() {
                const email = $('#email').val().trim();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email === '') {
                    $('#email_error').text('Please enter a valid email address').show();
                } else if (!emailPattern.test(email)) {
                    $('#email_error').text('Please enter a valid email address').show();
                } else {
                    $('#email_error').hide();
                }
            });

            $('#pickup_street').on('blur change', function() {
                validateField('#pickup_street', '#pickup_street_error');
            });

            $('#pickup_city').on('blur change', function() {
                validateField('#pickup_city', '#pickup_city_error');
            });

            $('#pickup_state').on('blur change', function() {
                validateField('#pickup_state', '#pickup_state_error');
            });

            $('#destination_street').on('blur change', function() {
                validateField('#destination_street', '#destination_street_error');
            });

            $('#destination_city').on('blur change', function() {
                validateField('#destination_city', '#destination_city_error');
            });

            $('#destination_state').on('blur change', function() {
                validateField('#destination_state', '#destination_state_error');
            });
            $('#destination_state').on('blur change', function() {
                validateField('#destination_state', '#destination_state_error');
            });
            $('#travel_date').on('blur change', function() {
                validateField('#travel_date', '#travel_date_error');
            });
            $('#travel_time').on('blur change', function() {
                validateField('#travel_time', '#travel_time_error');
            });
            $('#service_level').on('blur change', function() {
                validateField('#service_level', '#service_level_error');
            });
            $('#simpleForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                var isValid = true;

                // Clear previous errors
                // Validate fields
                $(".error").hide();

                // Validate fields
                function validateField(fieldId, errorId, message) {
                    var value = $(fieldId).val().trim();
                    var $error = $(errorId);
                    if (value === '') {
                        $error.text(message).show();
                        isValid = false;
                    }
                }

                validateField('#first_name', '#first_name_error');
                validateField('#last_name', '#last_name_error');
                validateField('#dob', '#dob_error');
                validateField('#phone', '#phone_error');
                validateField('#pickup_street', '#pickup_street_error');
                validateField('#pickup_city', '#pickup_city_error');
                validateField('#pickup_state', '#pickup_state_error');
                validateField('#destination_street', '#destination_street_error');
                validateField('#destination_city', '#destination_city_error');
                validateField('#destination_state', '#destination_state_error');
                validateField('#travel_date', '#travel_date_error');
                validateField('#travel_time', '#travel_time_error');
                validateField('#service_level', '#service_level_error');


                var email = $("#email").val().trim();
                var emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
                if (!emailPattern.test(email)) {
                    $("#email_error").show();
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission
                } else {
                    var first_name = $("input[name='first_name']").val();
                    var last_name = $("input[name='last_name']").val();
                    var email = $("input[name='email']").val();
                    var dob = $("input[name='dob']").val();
                    var phone = $("input[name='phone']").val();
                    var pickup_street = $("input[name='pickup_street']").val();
                    var pickup_city = $("input[name='pickup_city']").val();
                    var pickup_state = $("input[name='pickup_state']").val();
                    var destination_street = $("input[name='destination_street']").val();
                    var destination_city = $("input[name='destination_city']").val();
                    var destination_state = $("input[name='destination_state']").val();
                    var travel_date = $("input[name='travel_date']").val();
                    var travel_time = $("input[name='travel_time']").val();
                    var service_level = $("input[name='service_level']").val();
                    var special_needs = $("input[name='special_needs']").val();
                    var url = "<?php echo plugins_url('', __FILE__); ?>/process_form.php";

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#simpleForm')[0].reset();
                            $('#message').show().html(response.message);

                            var id = response.id;
                            setTimeout(function() {
                                // Construct the URL with the inserted_id as a query parameter
                                var redirectUrl = '<?php echo home_url(); ?>/order-page/?id=' + encodeURIComponent(id);
                                window.location.href = redirectUrl;
                            });
                        }
                    });


                }
            });
            $('#service_level').on('blur change', function() {
                // Show the loader
                $('.loader').show();

                // Hide the display value initially
                $('#displayValue span').not('.loader').hide();

                // Set a timeout for 1 second (1000 milliseconds)
                setTimeout(function() {
                    var selectedValue = $('#service_level').val();

                    // Update the display value
                    $('#displayValue').html('Total: $<span style="color: green;">' + (selectedValue ? selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1) : '0') + '</span>');

                    // Hide the loader
                    $('.loader').hide();

                    // Show the updated display value
                    $('#displayValue span').not('.loader').show();
                }, 500);
            });
        });
    </script>
<?php
    return ob_get_clean();
}
add_shortcode('simple_form', 'simple_form_shortcode');

// Create a custom table on plugin activation
function my_plugin_create_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'transport_booking'; // Table name with WordPress prefix
    $charset_collate = $wpdb->get_charset_collate();

    // SQL to create the table
    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        orderid VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        phone VARCHAR(50) NOT NULL,
        email VARCHAR(255) NOT NULL,
        pickup_street VARCHAR(255) NOT NULL,
        pickup_city VARCHAR(255) NOT NULL,
        pickup_state VARCHAR(255) NOT NULL,
        destination_street VARCHAR(255) NOT NULL,
        destination_city VARCHAR(255) NOT NULL,
        destination_state VARCHAR(255) NOT NULL,
        travel_date DATE NOT NULL,
        travel_time TIME NOT NULL,
        service_level VARCHAR(255) NOT NULL,
        special_needs TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Hook into the activation of the plugin
register_activation_hook(__FILE__, 'my_plugin_create_table');
