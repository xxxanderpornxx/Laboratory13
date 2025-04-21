<style>
    .register-form {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    .register-form input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .register-form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .register-form button:hover {
        background-color: #0056b3;
    }

    .register-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }
</style>

<form method="POST" action="/register" class="register-form">
    @csrf
    <h2>Register</h2>
    <input name="name" placeholder="Name" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
    <p>Already have an account?<a href="/login">Click here</a></p>
</form>
