<?php get_header(); /*Template Name: Import Users ClubReady*/ ?>
<?php
    include_once get_template_directory() . '/clubReady/api.php';
    $ClubReady = new ClubReady();
    $allUsers = $ClubReady->getAllUsers();
    echo '<pre>';
    $password= "Ag8QG2hMm&,Y[4qkup";
    $count = 0 ;
    foreach ($allUsers as $value) {
        if( $value->Email !== '' ){
            if ( !email_exists( $value->Email ) ) {
                //new User
                //$count+=1;
                if( $value->Prospect == false && $value->MembershipEndedDate == '' ){
                    
                    $user_id = wp_create_user( trim($value->Email), $password, trim($value->Email) );
                    if( $user_id ) {
                        echo "user created: ".trim($value->Email). ' - id: '.$user_id;
                        echo '<br>';
                        $user = new \WP_User( $user_id );
                        $user->set_role( 'customer' );

                        $user_updated = wp_update_user( 
                            array( 
                                'ID'                    => $user_id, 
                                'first_name'            => $value->FirstName,
                                'last_name'             => $value->LastName,
                                'show_admin_bar_front'  => 'false',
                                'user_nicename'         => $value->FirstName ,
                                'display_name'          => $value->FirstName . $value->LastName
                            ) 
                        );

                        $meta_data = array(
                            'prospect'              => $value->Prospect,
                            'dateAdded'             => $value->DateAdded,
                            'address'               => $value->Address,
                            'city'                  => $value->City,
                            'state'                 => $value->State,
                            'zip'                   => $value->Zip,
                            'phone'                 => $value->Phone,
                            'cellPhone'             => $value->CellPhone,
                            'externalUserId'        => $value->ExternalUserId,
                            'clubReadyUserId'       => $value->UserId,
                            'prospectTypeName'      => $value->ProspectTypeName,
                            'dateOfBirth'           => $value->DateOfBirth,
                            'memberSinceDate'       => $value->MemberSinceDate,
                            'membershipEndedDate'   => $value->MembershipEndedDate,
                            'emailOptOut'           => $value->EmailOptOut,    
                            'billing_city'          => $value->City,
                            'billing_postcode'      => $value->Zip,
                            'billing_email'         => trim($value->Email),
                            'billing_phone'         => $value->CellPhone,
                        );
                        foreach ($meta_data as $meta_key => $meta_value ) {
                            update_user_meta( $user_id, $meta_key, $meta_value );
                        }
                    }
                }
                

            }else {
                //update User //not sure if we are going to do this
                echo "user already exits" . trim($value->Email);
                echo '<br>';
            }
        }
        
    }

    echo '</pre>';
?>

<?php get_footer(); ?>