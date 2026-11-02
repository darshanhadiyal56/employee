<html>
<head>
<title>Employee Management System</title>

<style>
body {
    font-family: Arial;
    background: lightgray;
}

.container {
    width: 600px;
    margin: 30px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

h2, h3 {
    text-align: center;
}

input {
    padding: 8px;
    width: 90%;
}

td {
    padding: 10px;
}

button {
    background: green;
    color: white;
    padding: 10px 20px;
    border: none;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th {
    background: green;
    color: white;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
}
</style>
</head>

<body>

<div class="container">

<h2>Employee Management System</h2>

<form method="POST">

<table>
<tr>
    <td>Name:</td>
    <td><input type="text" name="name" required></td>
</tr>

<tr>
    <td>Job Title:</td>
    <td><input type="text" name="job" required></td>
</tr>

<tr>
    <td>Department:</td>
    <td><input type="text" name="dept" required></td>
</tr>

<tr>
    <td>Salary:</td>
    <td><input type="number" name="salary" required></td>
</tr>

<tr>
    <td>Contact:</td>
    <td><input type="text" name="contact" required></td>
</tr>

<tr>
    <td colspan="2" align="center">
        <button type="submit" name="save">Add Employee</button>
    </td>
</tr>
</table>

</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "employee_db");

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $job = $_POST['job'];
    $dept = $_POST['dept'];
    $salary = $_POST['salary'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO employees (name, job, department, salary, contact) VALUES ('$name','$job','$dept','$salary','$contact')";

    if(mysqli_query($conn, $sql))
    {
        echo "<h3 style='color:green'>
        Employee Added Successfully!</h3>";
    }
    else
    {
        echo "Error!";
    }
}
$q = "SELECT * FROM employees";
$result = mysqli_query($conn, $q);
?>

<h3>Employee Details</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Job</th>
    <th>Department</th>
    <th>Salary</th>
    <th>Contact</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo htmlspecialchars($row['name']); ?></td>
    <td><?php echo htmlspecialchars($row['job']); ?></td>
    <td><?php echo htmlspecialchars($row['department']); ?></td>
    <td><?php echo $row['salary']; ?></td>
    <td><?php echo htmlspecialchars($row['contact']); ?></td>
</tr>
<?php
}
?>

</table>

</div>
</body>
</html>