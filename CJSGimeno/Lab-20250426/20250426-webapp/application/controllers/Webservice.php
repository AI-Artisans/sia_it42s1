<?php
class Webservice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function consume()
    {
        $apiKey = "909bb8e55fac22bc2465748ae69899a0";


        $location = "Philippines";
        $apiUrl = "http://api.weatherstack.com/current?";
        $apiUrl .= "access_key={$apiKey}&query={$location}";

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute cURL session and store the response
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response
        $weatherData = json_decode($response, true);

        $data['weatherData'] = $weatherData;
        $this->load->view('wsconsume', $data);
    }
    public function broadcast()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            show_error('Method not allowed.', 405);
            return;
        } else {
            $this->load->model('Blogs_model', 'blogs');
            $data = $this->blogs->getSome();
            $wsdata = json_encode([
                'status' => true,
                'data' => $data
            ]);
            print_r($wsdata);
        }
    }

}
?>