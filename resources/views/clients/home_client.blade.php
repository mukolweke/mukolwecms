@extends('layouts.app')

@section('content')

    <div class="container" id="admin">

       @include('inc.navbar_client')

        <router-view name="ViewAdvisor"></router-view>
        <router-view></router-view>

        <div class="admin_home_container">
            <div class="grid-x">
                <div class="medium-6 columns">
                    <div class="callout boost2">
                        <h5>Supervisor</h5>
                        <div class="grid-x">
                            <div class="medium-6 cell">
                                <p> # 5</p>
                                <p>Email: test@user.com</p>
                                <p>Phone: +254719692332</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/img4.jpg" class="css-class thumbnail" alt="alt text">
                            </div>
                        </div>
                        <hr/>
                        <h5>Financial Advisor</h5>
                        <div class="grid-x">
                            <div class="medium-6 cell">
                                <p> # 5</p>
                                <p>Email: test@user.com</p>
                                <p>Phone: +254719692332</p>
                            </div>
                            <div class="medium-4 cell" style="margin-left: 70px;">
                                <img src="/storage/img1.jpg" class="css-class thumbnail" alt="alt text">
                            </div>
                        </div>
                        <hr/>
                    </div>
                </div>
                <div class="medium-6 columns" >
                    <div class=" ">
                        <div class="grid-x">
                            <div class="medium-12 cell">
                                <div class="table-scroll" >
                                    <h5 class="text-center">Cytonn Investments</h5>
                                    <table style="margin: 0 auto;">
                                        <thead style="background: black;color: white;">
                                        <tr>
                                            <th width="150">Name</th>
                                            <th width="150">Value</th>
                                            <th width="200">Invested</th>
                                            <th width="150">%</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                                <td>{Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                            </tr>
                                            <tr>
                                                <td>Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                                <td>{Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                            </tr>
                                            <tr>
                                                <td>Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                                <td>{Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                            </tr>
                                            <tr>
                                                <td>Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                                <td>{Content Goes Here</td>
                                                <td>Content Goes Here</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 90%">
                    <div>
                        <h5 class="text-center">Topup Investments</h5>
                        <form action="/api/v1/clients/" method="post">
                            <div class="grid-x">
                                <div class="medium-8 medium-offset-2 cell form-group">
                                    <label>Amount:
                                        <input type="text" name="name" placeholder="20,000" class="form-control" required>
                                    </label>
                                </div>
                            </div>
                            <div class="grid-x">
                                <div class="medium-8 medium-offset-2 cell form-group">
                                    <button type="submit" class="success button expanded" style="margin-top: 20px;color: white;">Add Amount Client</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
