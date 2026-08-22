<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class ZoomService
{
    /**
     * Get Zoom Access Token
     */
    public function getAccessToken(): string
    {
        $response = Http::asForm()
            ->withBasicAuth(
                config('services.zoom.client_id'),
                config('services.zoom.client_secret')
            )
            ->post('https://zoom.us/oauth/token', [
                'grant_type' => 'account_credentials',
                'account_id' => config('services.zoom.account_id'),
            ]);

        if ($response->failed()) {
            throw new Exception(
                'Zoom OAuth Error: ' . $response->body()
            );
        }

        return $response->json('access_token');
    }

    /**
     * Create Zoom Meeting
     */
    public function createMeeting(array $data): array
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->post('https://api.zoom.us/v2/users/me/meetings', [
                'topic' => $data['topic'],

                // Scheduled Meeting
                'type' => 2,

                // وقت الحصة
                'start_time' => $data['start_at'],

                // المدة بالدقائق
                'duration' => $data['duration'],

                'settings' => [

                    // الطالب لا يدخل قبل المعلم
                    'join_before_host' => true,

                    // Waiting Room
                    'waiting_room' => false,

                    // كاميرا المعلم
                    'host_video' => true,

                    // كاميرا الطالب
                    'participant_video' => true,

                    // صوت الكمبيوتر
                    'audio' => 'both',

                    // السماح للطالب باستخدام الميكروفون
                    'mute_upon_entry' => true,

                    // تسجيل تلقائي - OFF
                    'auto_recording' => 'cloud',

                    // السماح للطالب بالدخول من المتصفح
                    'allow_multiple_devices' => true,
                ],
            ]);

        if ($response->failed()) {
            throw new \Exception(
                'Zoom Create Meeting Error: ' . $response->body()
            );
        }

        return $response->json();
    }


    public function deleteMeeting(string $meetingId): bool
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->delete("https://api.zoom.us/v2/meetings/{$meetingId}");

        if ($response->failed() && $response->status() !== 404) {
            throw new Exception(
                'Zoom Delete Meeting Error: ' . $response->body()
            );
        }

        return true;
    }
}
