<?php 
// to display the error
$error               = '';

// for calculation monthly
$salary              = '';
$tax_percentage      = '';
$total_salary        = '';
$tax_amount          = '';
$social_security_fee = '';
$salary_after_tax    = '';

// for calculation yearly
    // will times the value with 12
$yearly = 12;

if(isset($_POST['calculate'])){
    // validate the from
    if(empty($_POST['salary'])){
        $error = 'Please fill this Feild';
    }
    if(empty($_POST['allowance'])){
        $error = 'Please fill this Feild';
    }
    if(!empty($_POST['salary'])&& !empty($_POST['allowance']) && empty($_POST['tax-fee'])){
        if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'year') || (isset($_POST['mon-year']) &&
                 $_POST['mon-year'] == 'month'))){
            if ($_POST["salary"] <= 10000){
                $salary              = $_POST["salary"];
                $tax_percentage      = 0;
                $tax_amount          = $salary * $tax_percentage;
                $social_security_fee = (($salary - $tax_amount) + $_POST['allowance']) * $tax_percentage;
                $salary_after_tax    = $salary - $tax_amount - $social_security_fee + $_POST['allowance'];
            }
            if (($_POST["salary"] > 10000) && ($_POST["salary"] < 25000)){
                $salary              = $_POST["salary"];
                $tax_percentage      = 0.11;
                $tax_amount          = $salary * $tax_percentage;
                $social_security_fee = (($salary - $tax_amount) + $_POST['allowance']) * $tax_percentage;
                $salary_after_tax    = $salary - $tax_amount - $social_security_fee + $_POST['allowance'];
            }
            if (($_POST["salary"] > 25000) && ($_POST["salary"] < 50000)){
                $salary              = $_POST["salary"];
                $tax_percentage      = 0.30;
                $tax_amount          = $salary * $tax_percentage;
                $social_security_fee = (($salary - $tax_amount) + $_POST['allowance']) * $tax_percentage;
                $salary_after_tax    = $salary - $tax_amount - $social_security_fee + $_POST['allowance'];
            }
            if ($_POST["salary"] > 50000){
                $salary              = $_POST["salary"];
                $tax_percentage      = 0.45;
                $tax_amount          = $salary * $tax_percentage;
                $social_security_fee = (($salary - $tax_amount) + $_POST['allowance']) * $tax_percentage;
                $salary_after_tax    = $salary - $tax_amount - $social_security_fee + $_POST['allowance'];
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tax Form</title>
</head>
<body>
    <div class="container">
        <h1>Income Tax Calculator</h1>
        <div>
            <form action="home.php" method="POST">
                <input type="number" name="salary" placeholder="Enter The Salary" ><br>
                <span class="error"><?php echo $error;  ?></span><br>
                <label for="yearly">Yearly</label><input type="radio" name="mon-year" id="yearly" value="year">
                <label for="monthly">Monthly</label><input type="radio" name="mon-year" id="monthly" value="month"><br>
                <input type="number" name="allowance" placeholder="Tax Free Allowance" ><br>
                <span class="error"><?php echo $error;  ?></span><br>
                <input type="submit" name="calculate" value="Calculate"><br>

            </form>
        </div>
        <table class="mytable-marg">
            <tr>
                <th>\</th>
                <th>Yearly</th>
                <th >Monthly</th>
            </tr>
            <tr>
                <th>Total salary</th>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'year')))
                    {echo $salary * $yearly . ' $';} ?>
                </td>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'month')))
                    {echo $salary . ' $';} ?>
                </td>
            </tr>
            <tr>
                <th>Tax amount</th>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'year')))
                    {echo $tax_amount * $yearly . ' $';} ?>
                </td>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'month')))
                    {echo $tax_amount . ' $';} ?>
                </td>
            </tr>
            <tr>
                <th>Social security fee</th>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'year')))
                    {echo $social_security_fee * $yearly . ' $';} ?>
                </td>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'month')))
                    {echo $social_security_fee . ' $';} ?>
                </td>
            </tr>
            <tr>
                <th>Salary after tax</th>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'year')))
                    {echo $salary_after_tax * $yearly . ' $';} ?>
                </td>
                <td>
                    <?php if((isset($_POST['mon-year'])) && (($_POST['mon-year'] == 'month')))
                    {echo $salary_after_tax . ' $';} ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>