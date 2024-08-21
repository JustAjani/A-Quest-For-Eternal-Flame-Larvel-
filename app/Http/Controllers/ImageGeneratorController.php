<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class ImageGeneratorController extends Controller
{
    /**
     * Display the form for generating images.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        return view('imageGen.image_form');
    }

    /**
     * Handle the image generation request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateImage(Request $request)
    {   
        ini_set('max_execution_time', 120);
        $description = $request->input('description');
        $client = new Client();
        $apiKey = env('HUGGING_FACE_API_KEY'); // Ensure your API key is stored in .env

        try {
            // Send request to Hugging Face Inference API
            $response = $client->request('POST', 'https://api-inference.huggingface.co/models/black-forest-labs/FLUX.1-dev', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'inputs' => $description,
                ],
            ]);

            // Get the binary content of the image
            $imageContent = $response->getBody()->getContents();

            // Generate a unique file name and save the image to the public storage
            $fileName = 'generated_image_' . time() . '.png';
            Storage::disk('public')->put($fileName, $imageContent);

            // Generate a URL to the saved image
            $imageUrl = Storage::url($fileName);

            return view('imageGen.image_result', ['imageUrl' => $imageUrl]);

        } catch (\Exception $e) {
            \Log::error('Failed to generate image', ['error' => $e->getMessage()]);
            session()->flash('error', 'Failed to generate image: ' . $e->getMessage());
            return back();
        }
    }
}