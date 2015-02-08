<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 05/02/15
 * Time: 5:29 PM
 */

 final class Installer extends CI_Controller{

    public function verify(){
        if(file_exists(realpath('./data/installer.php'))){
            //this project has not been installed yet
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $this->completeConfiguration();
            }else{
                $this->install();
            }


        }else{
            echo "LOST";
            var_dump(realpath('./data/installer.php'));
            $this->loadPage();
        }
    }

    private function install(){
        $CI = $this->CI =& get_instance();
        $CI->output->get_output();



        $installView = $this->load->view('install',"" ,TRUE);

        //return the html to the display
        $CI->output->set_output($installView);
        $CI->output->_display();
    }

    private function loadPage(){
        $CI = $this->CI =& get_instance();
        $CI->output->_display();
    }

    private function completeConfiguration(){
        ob_start();
        $dbName = $this->input->post('inputDBName');
        $username = $this->input->post('dbUsername');
        $password = $this->input->post('dbPassword');

        $lines = file(realpath('./application/config/database.php'), FILE_IGNORE_NEW_LINES);

        var_dump($lines);
        echo "<br><br><br>";
        echo $lines[68] . "<br>";
        echo $lines[69] . "<br>";
        echo $lines[70] . "<br>";

        $lines[68] = "'username' => '". $username . "',";
        $lines[69] = "'password' => '". $password . "',";
        $lines[70] = "	'database' => '" . $dbName . "',";

        echo "<br><br><br>";
        echo $lines[68] . "<br>";
        echo $lines[69] . "<br>";
        echo $lines[70] . "<br>";

        $fp = fopen('./application/config/database.php', 'w+');
        fwrite($fp,implode(PHP_EOL, $lines));
        fclose($fp);

        //now build the database

        $this->load->dbforge();

        if (!$this->dbforge->create_database($dbName))
        {
            echo 'Database failed to be created';
        }
        // run a script on the database
        //$this->db->query(file_get_contents(realpath('./data/comp4711-lab04-setup2.sql')));


        $menuFields = array(
            'code' => array(
                'type' => 'INT',
                'constraint' => '100',
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '32',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '256',
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => array (10,2),
            ),
            'picture' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'category' => array(
                'type' => 'VARCHAR',
                'constraint' => '1'
            )
        );

        $this->dbforge->add_key('code', TRUE);
        $this->dbforge->add_field($menuFields);
        $this->dbforge->create_table('menu', TRUE);

        /*$this->db->query(
            "INSERT INTO menu (code, name, description, price, picture, category) VALUES
            (1, 'Cheese', 'Leave this raw milk, beefy and sweet cheese out for an hour before serving and pair with pear jam.', '2.95', '1.png', 's'),
            (2, 'Turkey', 'Roasted, succulent, stuffed, lovingly sliced turkey breast', '5.95', '2.png', 'm'),
            (6, 'Donut', 'Disgustingly sweet, topped with artery clogging chocolate and then sprinkled with Pixie dust', '1.25', '6.png', 's'),
            (10, 'Bubbly', '1964 Moet Charmon, made from grapes crushed by elves with clean feet, perfectly chilled.', '14.50', '10.png', 'd'),
            (11, 'Ice Cream', 'Combination of decadent chocolate topped with luscious strawberry, churned by gifted virgins using only cream from the Tajima strain of wagyu cattle', '3.75', '11.png', 's'),
            (8, 'Hot Dog', 'Pork trimmings mixed with powdered preservatives, flavourings, red colouring and drenched in water before being squeezed into plastic tubes. Topped with onions, bacon, chili or cheese - no extra charge.', '6.90', '8.png', 'm'),
            (25, 'Burger', 'Half-pound of beef, topped with bacon and served with your choice of a slice of American cheese, red onion, sliced tomato, and Heart Attack Grill''s own unique special sauce.', '9.99', 'burger.png', 'm'),
            (21, 'Coffee', 'A delicious cup of the nectar of life, saviour of students, morning kick-starter; made with freshly grounds that you don''t want to know where they came from!', '2.95', 'coffee.png', 'd')");
*/






        echo "hello";

        ob_end_flush();

    }
}