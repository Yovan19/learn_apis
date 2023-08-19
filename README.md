----- Students APIs For Beginner -----

1. Store Student
Endpoint: {{base-url}}student/store
Method: POST
Body Request:
![image](https://github.com/Yovan19/learn_apis/assets/124430108/35aebeac-2918-4ad8-88d2-27a7285cb757)
Success Response:
{
    "status": "success",
    "code": 200,
    "message": "Student Registered Successfully",
    "data": {
        "student": {
            "first_name": "yovan",
            "last_name": "patel",
            "email": "yovan@yopmail.com",
            "date_of_birth": "2000/08/11",
            "gender": "Male",
            "address": "surat, near ak road",
            "phone_number": "8978455641",
            "updated_at": "2023-08-19T09:31:00.000000Z",
            "created_at": "2023-08-19T09:31:00.000000Z",
            "id": 3
        }
    }
}

Error Response:
{
    "status": "error",
    "code": 401,
    "message": "Something went wrong.",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "date_of_birth": [
            "The date of birth field is required."
        ]
    }
}

-----------------
2. single listing
Endpoint: {{base-url}}student/list/3
Method: GET
Body Request:
![image](https://github.com/Yovan19/learn_apis/assets/124430108/f4e969ee-a7f2-4bfa-ad3b-1770abd7443d)
Success Response:
{
    "status": "success",
    "code": 200,
    "message": "Student Listing",
    "data": {
        "student": [
            {
                "id": 3,
                "first_name": "yovan",
                "last_name": "patel",
                "date_of_birth": "2000-08-11",
                "gender": "Male",
                "address": "surat, near ak road",
                "phone_number": "8978455641",
                "email": "yovan@yopmail.com",
                "created_at": "2023-08-19T09:31:00.000000Z",
                "updated_at": "2023-08-19T09:31:00.000000Z",
                "deleted_at": null
            }
        ]
    }
}

Error Response:
{
    "status": "error",
    "code": 401,
    "message": "Student Not found."
}

-----------------
3. All listing
Endpoint: {{base-url}}student/list
Method: GET
Body Request:
![image](https://github.com/Yovan19/learn_apis/assets/124430108/372d8a73-cd52-4b64-90c5-ce40f267d418)
Success Response:
{
    "status": "success",
    "code": 200,
    "message": "All Students Listing",
    "data": {
        "student": [
            {
                "id": 2,
                "first_name": "yuvi",
                "last_name": "patel",
                "date_of_birth": "2010-08-11",
                "gender": "Male",
                "address": "surat, near fulpada",
                "phone_number": "8978455645",
                "email": "yuvi@yopmail.com",
                "created_at": "2023-08-19T08:26:00.000000Z",
                "updated_at": "2023-08-19T09:28:00.000000Z",
                "deleted_at": null
            },
            {
                "id": 3,
                "first_name": "yovan",
                "last_name": "patel",
                "date_of_birth": "2000-08-11",
                "gender": "Male",
                "address": "surat, near ak road",
                "phone_number": "8978455641",
                "email": "yovan@yopmail.com",
                "created_at": "2023-08-19T09:31:00.000000Z",
                "updated_at": "2023-08-19T09:31:00.000000Z",
                "deleted_at": null
            }
        ]
    }
}

-----------------
4. update
Endpoint: {{base-url}}student/update/2
Method: POST
Body Request:
![image](https://github.com/Yovan19/learn_apis/assets/124430108/66ce655d-870b-49d2-810b-f0c0870dd19b)
Success Response:
{
    "status": "success",
    "code": 200,
    "message": "Student Updated Successfully",
    "data": {
        "student": {
            "id": 2,
            "first_name": "yuvi",
            "last_name": "patel",
            "date_of_birth": "2010/08/11",
            "gender": "Male",
            "address": "surat, near fulpada",
            "phone_number": "8978455645",
            "email": "yuvi@yopmail.com",
            "created_at": "2023-08-19T08:26:00.000000Z",
            "updated_at": "2023-08-19T09:39:00.000000Z",
            "deleted_at": null
        }
    }
}

Error Response:
{
    "status": "error",
    "code": 401,
    "message": "Student Not found."
}
-----------------
5. delete
Endpoint: {{base-url}}student/delete/2
Method: DELETE
Body Request:
![image](https://github.com/Yovan19/learn_apis/assets/124430108/299eaff9-3958-4df4-92f9-4486a4844fb8)
Success Response:
{
    "status": "success",
    "code": 200,
    "message": "Student deleted successfully."
}

Error Response:
{
    "status": "error",
    "code": 401,
    "message": "Student Not found."
}