define({ "api": [
  {
    "type": "post",
    "url": "/transaction",
    "title": "Transaction Add",
    "name": "Transaction",
    "description": "<p>will try to add new amount into database, before that will check if all lists are valid</p>",
    "group": "Transaction",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "amount",
            "description": "<p>Amount to add</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 201 Created\n{\n   \"success\": \"The amount was saved\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"error\": {\n               \"data\": \"Wrong username\\/password\n               combination.\",\n               \"code\": 401\n           }\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 500 Internal Server Error\n{\n  \"error\": {\n  \"data\": \"Data in this table failed the hash correlation.\",\n  \"code\": 500\n  }\n }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/TransactionController.php",
    "groupTitle": "Transaction",
    "sampleRequest": [
      {
        "url": "http://localhost/transaction"
      }
    ]
  },
  {
    "type": "post",
    "url": "/user/login",
    "title": "User Login/Create.",
    "name": "Login",
    "description": "<p>Login user or create if doesn't exists email in database</p>",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>User's email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>User's password</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response when user exists in db and it is just logged:",
          "content": "HTTP/1.1 200 OK\n{\n   \"email\": \"user-email@domain.com\",\n   \"token\": \"token-generated-after-login\"\n   }",
          "type": "json"
        },
        {
          "title": "Success-Response when user is created:",
          "content": "HTTP/1.1 201 Created\n{\n   \"email\": \"user-email@email.com\",\n   \"token\": \"token generated after user was created\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response wrong email or password:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"error\": {\n               \"data\": \"Wrong username\\/password combination.\",\n               \"code\": 401\n           }\n}",
          "type": "json"
        },
        {
          "title": "Error-Response validation error:",
          "content": "HTTP 1.1 422 Unprocessable Entity\n{\n   \"errors\": {\n        \"email\": [ \"The email field is required.\"],\n        \"password\": [ \"The password field is required.\" ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/UserController.php",
    "groupTitle": "User",
    "sampleRequest": [
      {
        "url": "http://localhost/user/login"
      }
    ]
  }
] });
