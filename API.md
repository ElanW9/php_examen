API Routes
This document outlines the available API routes for the application.

User Routes
Get User
URL: /api/user
Method: GET
Description: Retrieve the authenticated user.
Authentication: Requires authentication with Sanctum.
Response:
200 OK: The request was successful. Returns the user information.
401 Unauthorized: The request lacks valid authentication credentials.

Game Routes
post answer
URL: /api
Method: POST
Description: post a guess.
Request Body:
word (required, string, size:5): The word for the game.
Response:
201 Created: The word was posted successfully. Returns the created game data.
422 Unprocessable Entity: The request body contains validation errors.
