<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-12">
			<h3>
				h3. 这是gtmd和风寿司.
			</h3>
			<div class="row-fluid">
				<div class="col-md-8">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#">热食系列</a>
						</li>
						<li>
							<a href="#">冷食系列</a>
						</li>
						<li>
							<a href="#">刺身系列</a>
						</li>
						<li>
							<a href="#">套餐系列</a>
						</li>
						<li>
							<a href="#">生鲜手握</a>
						</li>
						<li>
							<a href="#">熟食手握</a>
						</li>
						<li>
							<a href="#">细卷</a>
						</li>
						<li>
							<a href="#">寿司卷</a>
						</li>
						<li>
							<a href="#">寿司军舰</a>
						</li>
						<li class="dropdown pull-right">
							 <a href="#" data-toggle="dropdown" class="dropdown-toggle">下拉<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">操作</a>
								</li>
								<li>
									<a href="#">设置栏目</a>
								</li>
								<li>
									<a href="#">更多设置</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">分割线</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="thumbnails">
						
						<?php
#header("Content-type: text/html; charset:utf-8");

$con = mysqli_connect("localhost:3306","root","123");

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db($con,"HefengSushi");
mysqli_query($con,'set names utf8');
$result = mysqli_query($con,"SELECT * FROM Dish");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
  	echo "<li class='col-md-4'>
                    <div class='thumbnail'>
                        <img alt='300x200' src='menu/"."".$row['Picture'].""."'/>
                        <div class='caption'>
                            <h3>
                                "." ".$row['DishName']." "."
                            </h3>
                            <p>
                                "." ".$row['Price']." "."
                            </p>
                            <p>
                                <a class='btn btn-primary' href='#''>浏览</a> <a class='btn' href='#'>分享</a>
                            </p>
                        </div>
                    </div>
         </li>
    ";
  }

mysqli_close($con);
?>
					</ul>
				</div>
				<div class="col-md-4">
					<table class="table">
						<thead>
							<tr>
								<th>
									编号
								</th>
								<th>
									产品
								</th>
								<th>
									交付时间
								</th>
								<th>
									状态
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									1
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									01/04/2012
								</td>
								<td>
									Default
								</td>
							</tr>
							<tr class="success">
								<td>
									1
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									01/04/2012
								</td>
								<td>
									Approved
								</td>
							</tr>
							<tr class="error">
								<td>
									2
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									02/04/2012
								</td>
								<td>
									Declined
								</td>
							</tr>
							<tr class="warning">
								<td>
									3
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									03/04/2012
								</td>
								<td>
									Pending
								</td>
							</tr>
							<tr class="info">
								<td>
									4
								</td>
								<td>
									TB - Monthly
								</td>
								<td>
									04/04/2012
								</td>
								<td>
									Call in to confirm
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
