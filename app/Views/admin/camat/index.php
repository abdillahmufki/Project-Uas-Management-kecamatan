<?= $this->extend('layout/page_layout')?>

<?= $this->section('page-title')?>
    <h1>Camat</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Camat</a></li>
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
<div class="row">
    <div class="col-lg-12">

    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Default Table</h5>

        <!-- Default Table -->
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Age</th>
            <th scope="col">Start Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Brandon Jacob</td>
            <td>Designer</td>
            <td>28</td>
            <td>2016-05-25</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Bridie Kessler</td>
            <td>Developer</td>
            <td>35</td>
            <td>2014-12-05</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Ashleigh Langosh</td>
            <td>Finance</td>
            <td>45</td>
            <td>2011-08-12</td>
            </tr>
            <tr>
            <th scope="row">4</th>
            <td>Angus Grady</td>
            <td>HR</td>
            <td>34</td>
            <td>2012-06-11</td>
            </tr>
            <tr>
            <th scope="row">5</th>
            <td>Raheem Lehner</td>
            <td>Dynamic Division Officer</td>
            <td>47</td>
            <td>2011-04-19</td>
            </tr>
        </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
    </div>

   
    </div>
</div>
<?= $this->endSection()?>
