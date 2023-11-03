<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Khill\Lavacharts\Lavacharts;


class IndexController extends Controller
{
    public function index() 
    {
        $client = new Client();
        $response = $client->get('https://7c24-15-160-10-141.ngrok-free.app/api/records');
      
        $records = json_decode($response->getBody(), true);
        $dataCollection = [];

        if (isset($records['records'])) {
            foreach ($records['records'] as $record) {
                $recordData = json_decode($record['record'], true);
                $headCount = $recordData['head_count'];
                $date = $recordData['date'];
                $time = $recordData['time'];

                // Include the entire record data
                $rawData = json_decode($record['record'], true);
                $raw = $rawData['raw'];

                

                // Collect data into an array
                $dataCollection[] = [
                    'head_count' => $headCount,
                    'date' => $date,
                    'time' => $time,
                    'raw_data' => $rawData, // Keep the entire raw data if needed
                    'raw' => $raw, // Add the 'raw' field to the array
                ];
                
            }
        }
        
        $lastRecord = end($dataCollection);
  
        return view('backend.admin.layouts.room')
            ->with('lastRecord', $lastRecord);
    }

    public function history()
    {
        $client = new Client();
        $response = $client->get('https://7c24-15-160-10-141.ngrok-free.app/api/records');
    
        $records = json_decode($response->getBody(), true);
    
        $dataCollection = [];
    
        if (isset($records['records'])) {
            // Use array_slice to get the latest 30 entries
            $latestRecords = $records['records'];
    
            foreach ($latestRecords as $record) {
                $recordData = json_decode($record['record'], true);
                $headCount = $recordData['head_count'];
                $time = $recordData['time'];
    
                // Collect data into an array
                $dataCollection[] = [
                    'head_count' => $headCount,
                    'time' => $time,
                ];
            }
        }
    
        // Create a Lavachart
        $lava = new Lavacharts;
        $chart = $lava->DataTable();
        $chart->addStringColumn('Time')->addNumberColumn('Head Count');
    
        foreach ($dataCollection as $entry) {
            $chart->addRow([$entry['time'], $entry['head_count']]);
        }
    
        $lava->BarChart('HistoryChart', $chart);
    
        return view('backend.admin.history.index', compact('dataCollection', 'lava'));
    }
    

    public function sendNotification(Request $request)
    {
        $headCount = $request->input('headCount');
        $email = $request->input('email');
        $notificationMethod = $request->input('notificationMethod');

        if ($headCount >= 10 && $notificationMethod === 'email') {
            // Use AWS SES to send email
            $ses = new SesClient([
                'version' => 'latest',
                'region' => 'your_aws_region', // Replace with your AWS region
                'credentials' => [
                    'key' => 'your_aws_access_key',
                    'secret' => 'your_aws_secret_key',
                ],
            ]);

            $subject = 'Your Email Subject';
            $message = 'Your email content goes here';

            $ses->sendEmail([
                'Source' => 'your_verified_email@your_domain.com',
                'Destination' => [
                    'ToAddresses' => [$email],
                ],
                'Message' => [
                    'Subject' => [
                        'Data' => $subject,
                    ],
                    'Body' => [
                        'Text' => [
                            'Data' => $message,
                        ],
                    ],
                ],
            ]);

            return response()->json(['message' => 'Email sent successfully']);
        } else if ($headCount >= 5 && $notificationMethod === 'sms') {
            // Add your SMS notification logic here
            return response()->json(['message' => 'SMS logic not implemented']);
        } else {
            return response()->json(['message' => 'Notification conditions not met']);
        }
    }


}
