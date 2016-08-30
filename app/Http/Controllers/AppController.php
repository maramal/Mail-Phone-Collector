<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl\Curl;

use App\Http\Requests;

class AppController extends Controller
{
    public function homePost (Request $request)
    {
        $result = '';
        $search = $request->input('type');
        
        // Parse the site URLs from the Input data and assign them to an array
        $urls = explode(
            "\n", 
            str_replace(
                "\r", 
                "", 
                $request->input('urls')
            )
        );
        
        // Iterate the URL array
        foreach ($urls as $url)
        {
            // New cURL Instance
            $curl = new Curl();
            
            // Set the cURL client options
            $curl->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, FALSE);
            
            // Get the HTML code
            $curl->get(trim($url));
            
            if($curl->error && ($curl->error_code != 404)) return redirect('/')->withInput()->with('error', 'Ocurrio un error al procesar las URLs.');
            
            // Parse the HTML code into a line separated array
            $response = explode("\n", $curl->response);
            
            // Iterate each line
            foreach($response as $r)
            {
                // Search for links and assign matches to $res
                preg_match("/\"$search:(.*)\"/", $r, $res);
                
                // Verify that the match has the right width and if not, "shortify" it.
                if(isset($res[1])) 
                {
                    if(strpos($res[1], '"'))
                    {
                        $ex = explode('"', $res[1]);
                        $res[1] = $ex[0];
                    }
                    
                    $result[] = $res[1];
                }
                
                /*// Append the link to a string variable in case the selected output is a textarea, or to an array if the output is a table.
                switch($request->input('output'))
                {
                    case 'text':
                        if(isset($res[1])) $result .= $res[1] . "\n";
                        break;
                    case 'table':
                        if(isset($res[1])) $result[$url] = $res[1];
                        break;
                }*/
            }
            
            // Close cURL connection
            $curl->close();
        }
        
        if(is_array($result))
        {
            $result = array_unique($result);
            sort($result);
        }
        
        if(empty($result)) return redirect('/')->withInput()->with('error', 'No se encontraron links.');
        
        $data = [ 'resultado' => $result ];
        
        return view('pages.result', $data);
    }
}
