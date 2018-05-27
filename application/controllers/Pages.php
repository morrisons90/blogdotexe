<?php
use Mailgun\Mailgun;
/**
 * Created by PhpStorm.
 * User: morri
 * Date: 23/05/2018
 * Time: 21:28
 */
class Pages extends CI_Controller{
    public function view($page = 'home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
    public function email(){
        # Include the Autoloader (see "Libraries" for install instructions)
        require '../../vendor/autoload.php';
        

        # Instantiate the client.
        $mgClient = new Mailgun('key-3ab76377d42afa7f2929b446b51a473f');
        $domain = "mg.blogdotexe.co.uk";

        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => 'Bae <josh@blogdotexe.co.uk>',
            'to'      => 'Boo <fayeburnley@gmail.com>',
            'subject' => 'Hi',
            'text'    => 'I love you.',
            'html'    => '<b>I love you.</b>'
        ));
    }
}