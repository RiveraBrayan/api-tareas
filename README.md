# Task Management API

This is a RESTful API for managing tasks, which includes functionalities for creating, reading, updating, and deleting tasks. The API is built using PHP and connects to a MySQL database.

## Endpoints

### 1. `GET /tasks/getAllTasks`

Retrieve all tasks.

**Response:**
- `200 OK` - Returns a list of all tasks.

**Example Response:**
```json
[
    {
        "id": 1,
        "title": "Task 1",
        "description": "Description of Task 1",
        "status": "completed"
    },
    {
        "id": 2,
        "title": "Task 2",
        "description": "Description of Task 2",
        "status": "incomplete"
    }
]
```

### 2. `GET /tasks/getTaskbyID/{id}`

Retrieve a specific task by its ID.

**URL Parameters:**
- `id` (required) - The ID of the task you want to retrieve.

**Response:**
- `200 OK` - Returns the task with the specified ID.
- `404 Not Found` - If no task is found with the specified ID.

**Example Response:**
```json
{
    "id": 1,
    "title": "Task 1",
    "description": "Description of Task 1",
    "status": "completed"
}
```
### 3. `PUT /tasks/update/{id}`

Update a task by its ID.

**URL Parameters:**
- `id` (required) - The ID of the task you want to update.

**Request Body:**
- `title` (required) - The title of the task.
- `description` (required) - The description of the task.
- `status` (required) - The status of the task (e.g., `1` for success, `0` for incomplete).

**Response:**
- `200 OK` - Task was successfully updated.
- `404 Not Found` - If no task is found with the specified ID.
- `400 Bad Request` - If required fields are missing or invalid.

**Example Response:**
```json
{
    "message": "Task updated successfully."
}
```
### 4. `DELETE /tasks/delete/{id}`

Delete a task by its ID.

**URL Parameters:**
- `id` (required) - The ID of the task you want to delete.

**Response:**
- `200 OK` - Task was successfully deleted.
- `404 Not Found` - If no task is found with the specified ID.

**Example Response:**
```json
{
    "message": "Task deleted successfully."
}
```