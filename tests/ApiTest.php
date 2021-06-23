<?php

namespace ACMS\Tests;

use ACMS\Api;

// backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase') &&
    class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', 'PHPUnit\Framework\TestCase');
}

use PHPUnit\Framework\TestCase;

//fwrite(STDERR, print_r($example_credential, TRUE));

// TODO: Add mocked response tests for speed

class ApiTest extends TestCase {

    // backward compatibility
    public function expectException($exception) {
        if (!method_exists('TestCase','expectException')) {
            $this->setExpectedException($exception);
        } else {
            $this->expectException($exception);
        }
    }

    private $group;

	protected function setUp(){
        
          $this->api = new Api("api key here");


        // Create a group
        $group_name = $this->RandomString(20);
        $this->group = $this->api->create_group($group_name, "Test course", "Test course description.");
    }

    protected function tearDown(){
        // Remove group
    	$response = $this->api->delete_group($this->group->group->id);
    }

    // http://stackoverflow.com/a/12570458
    protected function RandomString($length) {
        $keys = array_merge(range(0,9), range('a', 'z'));

        $key = "";
        for($i=0; $i < $length; $i++) {
            $key .= $keys[mt_rand(0, count($keys) - 1)];
        }
        return $key;
    }

    public function testSetAPIKey(){
        // Check the API key is set
        $api_key = "7b47e413b0216b489f0034960db4e84f";
        $api = new Api($api_key);
        $this->assertEquals($api_key, $api->getAPIKey());
    }

    public function testGetCredential(){
        $user_id  = 45;
        $email = "john@example.com";
        $name = "John Doe";
<<<<<<< HEAD
        try 
=======
        try
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            $new_credential = $this->api->create_credential($name, $email, $this->group->group->id, $user_id);

    	// Check if we can get a Credential
            $example_credential = $this->api->get_credential($new_credential->credential->id);
            $this->assertEquals($new_credential->credential->id, $example_credential->credential->id);
            $this->assertEquals($email, $example_credential->credential->recipient->email);
            $this->assertEquals($name, $example_credential->credential->recipient->name);
<<<<<<< HEAD
             
        }
        finally {
        //cleanup
            $this->api->delete_credential($new_credential->credential->id);     
        }
       
=======

        }
        finally {
        //cleanup
            $this->api->delete_credential($new_credential->credential->id);
        }

>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
    }

    public function testGetCredentials(){
        $user_id = 45;
<<<<<<< HEAD
    	

    	// Check if we can get credentials given an email
        try 
=======


    	// Check if we can get credentials given an email
        try
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
                $new_credential = $this->api->create_credential("John Doe", "john@example.com", $this->group->group->id, $user_id);
		$example_credentials = $this->api->get_credentials(null, "john@example.com", 1);
		$example_credential = array_values($example_credentials->credentials)[0];

		$this->assertEquals("john@example.com", $example_credential->recipient->email);
        }
<<<<<<< HEAD
        finally 
=======
        finally
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            //cleanup
		$this->api->delete_credential($new_credential->credential->id);
        }
<<<<<<< HEAD
		
=======

>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
    }

    public function testCreateCredential(){
    	//Check we can create a Credential
        $name = "John Doe";
        $user_id = 45;
        try
        {
		$new_credential = $this->api->create_credential("John Doe", "john@example.com", $this->group->group->id, $user_id);
		$this->assertEquals($name, $new_credential->credential->recipient->name);
        }
<<<<<<< HEAD
        finally 
=======
        finally
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            //cleanup
		$this->api->delete_credential($new_credential->credential->id);
        }
<<<<<<< HEAD
		
=======

>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
    }

    public function testCreateCredentialLegacy(){
        //Check we can create a Credential
        $name = "John Doe";
<<<<<<< HEAD
        try 
=======
        try
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            $new_credential = $this->api->create_credential_legacy("John Doe", "john@example.com", $this->group->group->name);
            $this->assertEquals("John Doe", $new_credential->credential->recipient->name);
        }
<<<<<<< HEAD
        finally 
=======
        finally
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            //cleanup
            $this->api->delete_credential($new_credential->credential->id);
        }
<<<<<<< HEAD
        
=======

>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
    }

    public function testUpdateCredential()
    {
        $user_id = 45;
<<<<<<< HEAD
        try 
=======
        try
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            $new_credential = $this->api->create_credential("John Doe", "john@example.com", $this->group->group->id, $user_id);

    	//Check we can update a Credential
            $name = "Jonathan Doe";
            $updated_credential = $this->api->update_credential($new_credential->credential->id, $name);
            $this->assertEquals($name, $updated_credential->credential->recipient->name);
        }
        finally {
            //cleanup
		$this->api->delete_credential($updated_credential->credential->id);
        }
<<<<<<< HEAD
		
=======

>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
    }

    public function testDeleteCredential()
    {
        $user_id = 45;
<<<<<<< HEAD
               
=======

>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        $new_credential = $this->api->create_credential("John Doe", "john@example.com", $this->group->group->id, $user_id);

    	// Can we delete a Credential
        $response = $this->api->delete_credential($new_credential->credential->id);
        $this->assertEquals("John Doe", $response->credential->recipient->name);
    }

    public function testGetGroup(){

    	// Can we get a group?
		$requested_group = $this->api->get_group($this->group->group->id);
		$this->assertEquals($this->group->group->name, $requested_group->group->name);
    }

    // TODO - implement
  //   public function testGetGroups(){
  //       $group_name = $this->RandomString(20);

  //   	$group = $this->api->create_group($group_name, "Test course", "Test course description.");

  //   	// Can we get a group?
		// $groups = $this->api->get_groups(1);
		// $example_group = array_values($groups->groups)[0];

		// $this->assertEquals($group_name, $example_group->name);

		// //cleanup
		// $response = $this->api->delete_group($example_group->id);
  //   }

    public function testCreateGroup(){
        $group_name = $this->RandomString(20);

    	// Can we create a Group
		$group = $this->api->create_group($group_name, "Test course", "Test course description.");
		$this->assertEquals($group_name, $group->group->name);

		//cleanup
		$response = $this->api->delete_group($group->group->id);
    }


    /**
     * @group WIP
     */
    public function testCreateCompleteGroup()
    {
        $group_name = $this->RandomString(20);
        $course_name = "Test course with meta";
        $course_description = "Test course description.";
        $course_id  = 20;
        $meta_data = array('course_id' => $course_id, 'award_type' => 'course_completion');

        // TODO create test cert and badges,  these are  existing ones,
        $cert_design_id = 176907;
        $badge_id = 179453;
        try
        {
            // Can we create a Group
            $group = $this->api->create_group($group_name, $course_name, $course_description ,$meta_data,$cert_design_id,  $badge_id);
            //echo 'Group:',print_r($group,true);
            $g = $group->group;
            $this->assertEquals($group_name, $g->name);
            $this->assertEquals($course_name,$g->course_name);
            $this->assertEquals($course_description, $g->course_description);
            $this->assertEquals($meta_data['course_id'], $g->meta_data->course_id);
            $this->assertEquals($meta_data['award_type'], $g->meta_data->award_type);
            $this->assertEquals($cert_design_id, $g->certificate_design_id);
            $this->assertEquals($badge_id, $g->badge_design_id);
        }
        finally { //cleanup
            if($group->group->id){
                $response = $this->api->delete_group($group->group->id);
            }
        }



    }


    /**
     * @group
     */
    public function testSearchGroups(){
        $group_name = $this->RandomString(20);
        $course_name = "Test course with meta";
        $course_description = "Test course description.";
        $course_id  = 20;
        // TODO create test cert and badges,  these are  existing ones,
        $cert_design_id = 176907;
        $badge_id = 179453;
        $meta_data = array('course_id' => $course_id, 'award_type' => 'course_completion');

        try
        {

            // Can we create a Group
            $group = $this->api->create_group($group_name, $course_name, $course_description , $meta_data, $cert_design_id, $badge_id);
            $this->assertEquals($group_name, $group->group->name);
            //echo 'Group:',print_r($group,true);
              // search for group
            $groups = $this->api->search_groups($group_name, $meta_data );
            //echo 'search:', print_r($groups, true);
            // expect one group
            $this->assertEquals(1, count($groups->groups));
            $found_group = $groups->groups[0];

            $this->assertEquals($group_name, $found_group->name);
            $this->assertEquals($course_name,$found_group->course_name);
            $this->assertEquals($meta_data['course_id'], $found_group->meta_data->course_id);
            $this->assertEquals($meta_data['award_type'], $found_group->meta_data->award_type);
            $this->assertEquals($cert_design_id, $found_group->certificate_design_id);
            $this->assertEquals($badge_id, $found_group->badge_design_id);

        }
        finally {
            //cleanup
           if($group->group->id){
                $response = $this->api->delete_group($group->group->id);
            }
        }


    }


    /**
     * Search using Group Meta only .
     * @group wip
     */
     public function testSearchGroupsMetaOnly(){
        $group_name = $this->RandomString(20);
        $course_name = "Test course with meta";
        $course_description = "Test course description.";
        $course_id  = 20;
        // TODO create test cert and badges,  these are  existing ones,
        $cert_design_id = 176907;
        $badge_id = 179453;
        $meta_data = array('course_id' => $course_id, 'award_type' => 'course_completion');

    	// Can we create a Group
        $group = $this->api->create_group($group_name,$course_name, $course_description, $meta_data, $cert_design_id, $badge_id);
        $this->assertEquals($group_name, $group->group->name);
        //echo 'Group:',print_r($group,true);

        // search for group using meta only
        try
        {
            $groups = $this->api->search_groups(null, $meta_data );
            //echo 'search:', print_r($groups, true);
            // expect one group
            $this->assertEquals(1, count($groups->groups));
            $found_group = $groups->groups[0];

            $this->assertEquals($group_name, $found_group->name);
            $this->assertEquals($course_name,$found_group->course_name);
            $this->assertEquals($meta_data['course_id'], $found_group->meta_data->course_id);
            $this->assertEquals($meta_data['award_type'], $found_group->meta_data->award_type);
            $this->assertEquals($cert_design_id, $found_group->certificate_design_id);
            $this->assertEquals($badge_id, $found_group->badge_design_id);
        }
        finally {
        //cleanup
            if($group->group->id){
                $response = $this->api->delete_group($group->group->id);
            }
        }

    }

    public function testUpdateGroup(){

        $new_name = $this->RandomString(20);

    	// Can we update a group?
		$requested_group = $this->api->update_group($this->group->group->id, $new_name);
		$this->assertEquals($new_name, $requested_group->group->name);
    }

    public function testDeleteGroup(){
        $group_name = $this->RandomString(20);

    	$group = $this->api->create_group($group_name, "Test course", "Test course description.");

    	// Can we delete a group?
		$response = $this->api->delete_group($group->group->id);
		$this->assertEquals($group_name, $response->group->name);
    }

    public function testGetDesigns(){

        // Can we get a group?
        $requested_designs = $this->api->get_designs(10, 1);
        $this->assertInternalType("int", $requested_designs->designs{0}->id);
    }

    public function testRecipientSSOLink(){

        //ensure the group has a design so our credential can be published
        $requested_designs = $this->api->get_designs(1, 1);
        $this->api->update_group($this->group->group->id, null, null, null, null, $requested_designs->designs{0}->id);

        $credential = $this->api->create_credential("John Doe", "john@example.com", $this->group->group->id,45);

        // Can we create a recipient redirect link
        $redirect = $this->api->recipient_sso_link(null, null, "john@example.com", null, $this->group->group->id);
        $this->assertRegexp('/&jwt=/', (string) $redirect->link);

        // Cleanup - Remove credential
        $this->api->delete_credential($credential->credential->id);

    }


    public function testSendBatchRequests(){
        $group_name = $this->RandomString(20);

        $group_data = array(
            "group" => array(
                "name" => $group_name,
                "course_name" => "Example Course",
                "course_description" => "Example Description",
                "course_link" => "https://www.accredible.com"
            )
        );
        $user_id  = 45;
        $email = "john@example.com";
        $name = "John Doe";
<<<<<<< HEAD
     
        try 
=======

        try
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
            // create a cred
            $new_credential = $this->api->create_credential($name, $email, $this->group->group->id, $user_id);
            $id = $new_credential->credential->id;
            $requests = [
                ["method" => "get",    "url" => "/v1/credentials/{$id}"],
                ["method" => "post",   "url" => "/v1/issuer/groups",        "params" => $group_data]
            ];

            $response = $this->api->send_batch_requests($requests);

            $response1 = json_decode($response->results[0]->body);
            $this->assertEquals($id, $response1->credential->id);

            $response2 = json_decode($response->results[1]->body);
            $this->assertEquals($group_name, $response2->group->name);
<<<<<<< HEAD
        }        
        finally 
=======
        }
        finally
>>>>>>> 5f8e03c79d521517289456d118ecfe6b0d28cc22
        {
             $this->api->delete_credential($new_credential->credential->id);
        }

    }

}
