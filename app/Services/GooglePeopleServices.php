<?php

namespace App\Services;

use Google_Client;
use Google_Service_PeopleService;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class GooglePeopleServices
{

    private $user;
    /**
     * @var Google_Client
     */
    private $client;

    public function getUserContacts(User $user): array
    {
        $this->client = new Google_Client();
        $this->client->setAccessToken($user->token);

        $response = [];

        $service = new Google_Service_PeopleService($this->client);

        // Print the names for up to 10 connections.
        $optParams = array(
            'pageSize' => 20,
            'personFields' => 'names,emailAddresses,phoneNumbers,biographies',
        );
        $results = $service->people_connections->listPeopleConnections('people/me', $optParams);

        if (count($results->getConnections()) == 0) {
            return $response;
        }
        foreach ($results->getConnections() as $person) {
            $email = $person->getEmailAddresses() ? $person->getEmailAddresses()[0]->getValue() : '';
            $phone = $person->getPhoneNumbers() ? $person->getPhoneNumbers()[0]->getValue() : '';
            $notes = $person->getBiographies() ? $person->getBiographies()[0]->getValue() : '';
            $response[] = [
                'names' => $person->getNames()[0]->getDisplayName(),
                'email' => $email,
                'phone' => $phone,
                'notes' => $notes
            ];
        }
        return $response;
    }
}
