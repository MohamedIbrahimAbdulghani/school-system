<?php

return [

    // Online Classes
    'direct_connection' => 'Connected directly to Zoom',
    'not_direct_connection' => 'Not connected directly to Zoom',

    'online_classes' => 'Online Classes',
    'add_new_class' => 'Add New Class',

    // Form fields
    'grade' => 'Grade',
    'classroom' => 'Classroom',
    'section' => 'Section',
    'teacher' => 'Teacher',
    'topic' => 'Class Topic',
    'start_at' => 'Start Date',
    'duration' => 'Duration in Minutes',
    'link' => 'Class Link',
    'processes' => 'Actions',

    // Validation messages
    'required_grade_id' => 'Please select the grade',
    'required_classroom_id' => 'Please select the classroom',
    'required_section_id' => 'Please select the section',
    'required_topic' => 'Please enter the class topic',
    'required_start_at' => 'Please enter the start date',
    'required_duration' => 'Please enter the class duration',

    // Validation - Exists
    'invalid_grade_id' => 'The selected grade does not exist',
    'invalid_classroom_id' => 'The selected classroom does not exist',
    'invalid_section_id' => 'The selected section does not exist',

    // Validation - Topic
    'invalid_topic' => 'The class topic must be a text',
    'topic_max' => 'The class topic must not exceed 255 characters',

    // Validation - Start At
    'invalid_start_at' => 'The start date is invalid',

    // Validation - Duration
    'invalid_duration' => 'The class duration must be a valid number of minutes',
    'duration_min' => 'The class duration must be at least 1 minute',

];
