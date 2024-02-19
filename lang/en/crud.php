<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
        'are_you_sure_update' => 'Are you sure? You need update ?',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'given_name' => 'Given Name',
            'middle_name' => 'Middle Name',
            'family_name' => 'Family Name',
            'dob' => 'Dob',
            'address' => 'Address',
            'mobile_number' => 'Mobile Number',
            'email' => 'Email',
            'password' => 'Password',
            'news_letter_subscription' => 'News Letter Subscription',
            'privacy_policy_and_terms_of_condition' =>
                'Privacy Policy And Terms Of Condition',
        ],
    ],

    'all_family_details' => [
        'name' => 'All Family Details',
        'index_title' => 'All Family Details List',
        'new_title' => 'New Family details',
        'create_title' => 'Create Family Details',
        'edit_title' => 'Edit Family Details',
        'show_title' => 'Show Family Details',
        'inputs' => [
            'given_name' => 'Given Name',
            'middle_name' => 'Middle Name',
            'family_name' => 'Family Name',
            'email_address' => 'Email Address',
            'contact_number' => 'Contact Number',
            'dob' => 'Dob',
            'relationship' => 'Relationship',
            'gothram' => 'Gothram',
            'rashi' => 'Rashi',
            'natchatram' => 'Natchatram',
        ],
    ],

    'frequencies' => [
        'name' => 'Frequencies',
        'index_title' => 'Frequencies List',
        'new_title' => 'New Frequency',
        'create_title' => 'Create Frequency',
        'edit_title' => 'Edit Frequency',
        'show_title' => 'Show Frequency',
        'inputs' => [
            'name' => 'Name',
            'days' => 'Days',
        ],
    ],

    'subscriber_types' => [
        'name' => 'Subscriber Types',
        'index_title' => 'SubscriberTypes List',
        'new_title' => 'New Subscriber type',
        'create_title' => 'Create SubscriberType',
        'edit_title' => 'Edit SubscriberType',
        'show_title' => 'Show SubscriberType',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'subscribers' => [
        'name' => 'Subscribers',
        'index_title' => 'Subscribers List',
        'new_title' => 'New Subscriber',
        'create_title' => 'Create Subscriber',
        'edit_title' => 'Edit Subscriber',
        'show_title' => 'Show Subscriber',
        'inputs' => [
            'token' => 'Token',
            'status' => 'Status',
            'email' => 'Email',
            'subscriber_type_id' => 'Subscriber Type',
            'frequency_id' => 'Frequency',
        ],
    ],

    'user_profiles' => [
        'name' => 'User Profiles',
        'index_title' => 'UserProfiles List',
        'new_title' => 'New User profile',
        'create_title' => 'Create UserProfile',
        'edit_title' => 'Edit UserProfile',
        'show_title' => 'Show UserProfile',
        'inputs' => [
            'contact_number_landline' => 'Contact Number Landline',
            'profile_picture' => 'Profile Picture',
            'gothram' => 'Gothram',
            'user_id' => 'User',
            'rashi' => 'Rashi',
            'natchatram' => 'Natchatram',
        ],
    ],

    'manage' => [
        'name' => 'Manage Account',
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'bookings' => [
        'name' => 'Bookings',
        'index_title' => 'Bookings List',
        'new_title' => 'New Booking',
        'create_title' => 'Create Booking',
        'edit_title' => 'Edit Booking',
        'show_title' => 'Show Booking',
        'inputs' => [
            'Check_In' => 'Check In',
            'Check_Out' => 'Check Out',
            'Booking_Reference_No' => 'Booking Reference No',
            'Customer_Given_Name' => 'Customer Given Name',
            'Customer_Family_Name' => 'Customer Family Name',
            'Customer_Contact_Number' => 'Customer Contact Number',
            'Customer_Email_Address' => 'Customer Email Address',
            'Total_Payment' => 'Total Payment',
            'Deposit_Made' => 'Deposit Made',
            'Balance_Amount' => 'Balance Amount',
            'Balance_Amount_Due' => 'Balance Amount Due',
            'user_id' => 'User',
            'hall_id' => 'Hall',
        ],
    ],

    'halls' => [
        'name' => 'Halls',
        'index_title' => 'Halls List',
        'new_title' => 'New Hall',
        'create_title' => 'Create Hall',
        'edit_title' => 'Edit Hall',
        'show_title' => 'Show Hall',
        'inputs' => [
            'Name' => 'Name',
            'Price' => 'Price',
        ],
    ],
];
