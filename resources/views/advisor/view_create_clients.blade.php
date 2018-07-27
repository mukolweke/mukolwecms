@extends('layouts.app')

@section('content')

    @include('inc.navbar_advisor')

    <div id="admin" class="view_advisor">

        <div class="grid-x">
            <div class="medium-offset-2 columns medium-8">

                <div class="card">
                    <div class="card-divider">Create New Client</div>
                    <div class="card-section">

                        <form action="/api/v1/clients/" method="post">
                            <div class="grid-x">
                                <div class="medium-4 cell form-group">
                                    <label>Name:
                                        <input type="text" name="name" placeholder="Mike Kuku" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4  cell form-group">
                                    <label>Email:
                                        <input type="email" name="email" placeholder="mike@kuku.com" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4 cell form-group">
                                    <label>Phone:
                                        <input type="number" name="phone" maxlength="10" placeholder="0722000000" pattern=".{3,}" class="form-control" required>
                                    </label>
                                </div>
                            </div>
                            <div class="grid-x">
                                <div class="medium-4 cell form-group">
                                    <label>Project Invested:
                                        <input type="text" name="project" placeholder="Amara" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4  cell form-group">
                                    <label>Investments:
                                        <input type="number" name="number" placeholder="2M" class="form-control" required>
                                    </label>
                                </div>
                                <div class="medium-4 cell form-group">
                                    <button type="submit" class="success button expanded" style="margin-top: 25px;">Save Client</button>
                                </div>
                            </div>

                            <input type="password" name="password"  value="Chancery1" class="hide">
                            <input type="text"  name="activation_code" class="hide">

                        </form>
                    </div>
                </div>


                <div class="table-scroll" >
                    <h4 class="text-center">Mike Client List</h4>
                    <table style="margin: 0 auto;">
                        <thead style="background: black;color: white;">
                        <tr>
                            <th width="200">Name</th>
                            <th width="150">Email</th>
                            <th width="200">Phone</th>
                            <th width="150">Investment</th>
                            <th width="150">Project</th>
                            <th width="150"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>

    </div>
@endsection
