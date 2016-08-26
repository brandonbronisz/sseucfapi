# Society of Sales Engineering (UCF) RESTful API

This repository holds the Restful API associated the the Society of Sales Engineering (UCF) web application.

## Installation

To start, clone the repository. Then run ``` Composer install ```. Composer will install the project dependencies.

Next, run ``` php artisan vendor:publish ``` to generate migration files.

Once that finishes, run ``` php artisan migrate ```. This will run the database migrations.

Finally, run ``` php artisan db:seed --class=OAuthClientsTableSeeder ```. Running this will insert the ``` client ``` into the ``` oauth_clients ``` table.

## Usage

To use this API, you need to download [Postman](https://www.getpostman.com/). Postman acts as a client sending requests to the API.

In order to give the client access to the API, you first need to obtain an access token. This token can be a retrieved by sending a ``` POST ``` request to ``` /oauth/access_token ```. Once you've completed that, you may access the API.

#### Getting an access token

In Postman, change the request type to ``` POST ``` and enter the URL ``` http://sseucf-api.dev/oauth/access_token ```, assuming that you've configured this project to be mapped to ``` http://sseucf-api.dev ```.

Next, we need to add some parameters so the server can verify the client. So click on the ``` Body ``` tab and then the ``` x-www-form-urlencoded ``` radio button and add the following key/values:

| Key        | Value                     |
| ------------- |:----------------------:|
| grant_type    | client_credentials     |
| client_id     | 1                      |
| client_secret | YZ<r2&%Jw,/tnhcm&&&zQ] |

Click ``` send ``` and a JSON response should be returned with the access key, token type, and the time till expiration.
```php
{
  "access_token": "53NQQwMaUSJvXQqu2ATK2t7wtRzjHHpX9TZ6DMOB",
  "token_type": "Bearer",
  "expires_in": 3600
}
```

#### Accessing the API

Now that we have the access token, we can access the API.

In Postman, setup a new ``` GET ``` request to be sent to ``` http://sseucf-api.dev/api ```. Next we need to add the access token as a parameter. Click on ``` Params ``` and enter the following key/value:

| Key           | Value                    |
| ------------- |:------------------------:|
| access_token  | [YOUR ACCESS TOKEN HERE]  |

where ``` [YOUR ACCESS TOKEN HERE] ``` is the token you've just received.

Then we need to send a ``` header ``` to determine which version of the API we want to run. In Postman, click on the headers tab and enter the following key/values:

| Key           | Value                             |
| ------------- |:---------------------------------:|
| Accept        | application/x.sseucf-api.v1+json  |

where ``` v1 ``` is the version you want to run.

-------

Don't forget to configure a ``` .env ``` file.
