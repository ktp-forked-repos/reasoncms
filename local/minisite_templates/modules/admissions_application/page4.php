<?php

/**
 * Admissions Application Module
 *
 * @author Steve Smith
 * @author Lucas Welper
 * @since 2011-02-11
 * @package ControllerStep
 *
 */
/*
 *  Fourth page of the application
 *
 *  Education Information
 *      Previous High Schools
 *      Previous Colleges
 *      Test Scores
 */
class ApplicationPageFour extends FormStep {

    var $_log_errors = true;
    var $error;
    var $elements = array(
        'education_header' => array(
            'type' => 'comment',
            'text' => '<h3>Your Education</h3>',
        ),
        'current_high_school_header' => array(
            'type' => 'comment',
            'text' => '<h4>Current High School</h4>',
        ),
        'final_high_school_header' => array(
            'type' => 'comment',
            'text' => '<h4>Final High School</h4>',
        ),
        'hs_name' => array(
            'type' => 'text',
            'display_name' => 'Name',
            'size' => 20,
        ),
        'hs_address' => array(
            'type' => 'text',
            'display_name' => 'Address',
            'size' => 20,
            'comments' => '¿¿¿¿If we are pulling from CEEB, is this needed????'
        ),
        'hs_city' => array(
            'type' => 'text',
            'display_name' => 'City',
            'size' => 15,
        ),
        'hs_state' => array(
            'type' => 'state_province',
            'display_name' => 'State/Province',
        ),
        'hs_zip' => array(
            'type' => 'text',
            'display_name' => 'Zip/Postal Code',
            'size' => 8,
        ),
        'hs_country' => array(
            'type' => 'Country',
            'display_name' => 'Country',
        ),
        'hs_grad_year' => array(
            'type' => 'year',
            'display_name' => 'Year of graduation',
        ),
        'college_1_header' => array(
            'type' => 'comment',
            'text' => '<h4>College/University</h4>',
        ),
        'college_1_name' => array(
            'type' => 'text',
            'display_name' => 'Name',
            'size' => 20,
        ),
        'college_1_address' => array(
            'type' => 'text',
            'display_name' => 'Address',
            'size' => 20,
            'comments' => '¿¿¿¿If we are pulling from CEEB, is this needed????'
        ),
        'college_1_city' => array(
            'type' => 'text',
            'display_name' => 'City',
            'size' => 15,
        ),
        'college_1_state' => array(
            'type' => 'state_province',
            'display_name' => 'State/Province',
        ),
        'college_1_zip' => array(
            'type' => 'text',
            'display_name' => 'Zip/Postal Code',
            'size' => 8,
        ),
        'college_1_country' => array(
            'type' => 'Country',
            'display_name' => 'Country',
        ),
        'college_2_header' => array(
            'type' => 'comment',
            'text' => '<h4>College/University</h4>',
        ),
        'college_2_name' => array(
            'type' => 'text',
            'display_name' => 'Name',
            'size' => 20,
        ),
        'college_2_address' => array(
            'type' => 'text',
            'display_name' => 'Address',
            'size' => 20,
            'comments' => '¿¿¿¿If we are pulling from CEEB, is this needed????'
        ),
        'college_2_city' => array(
            'type' => 'text',
            'display_name' => 'City',
            'size' => 15,
        ),
        'college_2_state' => array(
            'type' => 'state_province',
            'display_name' => 'State/Province',
        ),
        'college_2_zip' => array(
            'type' => 'text',
            'display_name' => 'Zip/Postal Code',
            'size' => 8,
        ),
        'college_2_country' => array(
            'type' => 'Country',
            'display_name' => 'Country',
        ),
        'college_3_header' => array(
            'type' => 'comment',
            'text' => '<h4>College/University</h4>',
        ),
        'college_3_name' => array(
            'type' => 'text',
            'display_name' => 'Name',
            'size' => 20,
        ),
        'college_3_address' => array(
            'type' => 'text',
            'display_name' => 'Address',
            'size' => 20,
            'comments' => '¿¿¿¿If we are pulling from CEEB, is this needed????'
        ),
        'college_3_city' => array(
            'type' => 'text',
            'display_name' => 'City',
            'size' => 15,
        ),
        'college_3_state' => array(
            'type' => 'state_province',
            'display_name' => 'State/Province',
        ),
        'college_3_zip' => array(
            'type' => 'text',
            'display_name' => 'Zip/Postal Code',
            'size' => 8,
        ),
        'college_3_country' => array(
            'type' => 'Country',
            'display_name' => 'Country',
        ),
        'tests_header' => array(
            'type' => 'comment',
            'text' => '<h3>Standardized Tests</h3>'
        ),
        'taken_tests_comment' => array(
            'type' => 'comment',
            'text' => 'Have you taken the SAT and/or ACT tests?'
        ),
        'taken_tests' => array(
            'type' => 'radio_inline_no_sort',
            'display_name' => '&nbsp;',
            'options' => array('Yes' => 'Yes', 'No' => 'No'),
        ),
        'sat_scores_comment' => array(
            'type' => 'comment',
            'text' => 'Please provide your best SAT scores'
        ),
        'sat_math' => array(
            'type' => 'text',
            'size' => 4,
            'display_name' => '&nbsp;',
            'comments' => 'Math'
        ),
        'sat_critical_reading' => array(
            'type' => 'text',
            'size' => 4,
            'display_name' => '&nbsp;',
            'comments' => 'Critical Reading'
        ),
        'sat_writing' => array(
            'type' => 'text',
            'size' => 4,
            'display_name' => '&nbsp;',
            'comments' => 'Writing'
        ),
        'act_scores_comment' => array(
            'type' => 'comment',
            'text' => 'Please provide your best ACT score'
        ),
        'act_composite' => array(
            'type' => 'text',
            'size' => 2,
            'display_name' => '&nbsp;',
            'comments' => 'Composite'
        ),
    );
    var $display_name = 'Education';
    var $error_header_text = 'Please check your form.';

    // style up the form and add comments et al
    function on_first_time() {
        if ($this->controller->get('student_type') == 'FR') {
            $this->change_element_type('final_high_school_header', 'hidden');
        } else {
            $this->change_element_type('current_high_school_header', 'hidden');
        }
    }

    function pre_show_form() {
        echo '<div id="admissionsApp" class="pageFour">' . "\n";
    }

    function post_show_form() {
        echo '</div>' . "\n";
    }
      function get_ceeb() {
       $return_arr = array();

       $availableTags = array(
            'Groovy',
            'Haskell',
            'Java',
            'JavaScript',
            'Lisp',
            'Perl',
            'PHP',
            'Python',
            'Ruby',
            'Scala',
            'Scheme'
        );
        array_push($return_arr, $availableTags);

        /* Toss back results as json encoded array. */
        echo json_encode($return_arr);
    }
  
}

?>
