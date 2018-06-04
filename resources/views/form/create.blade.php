
                                    <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/form" method="POST">
                                        {{csrf_field()}}

                                            <label  >Photo</label>
                                            <div  >
                                                <input type="file" name="photo" class="form-control">
                                            </div>


                                            <label  >Name</label>
                                            <div  >
                                                <input type="text" name="name" class="form-control" >
                                            </div>


                                            <label  >School Name</label>
                                            <div  >
                                                <input type="text" name="schoolName" class="form-control" >
                                            </div>


                                            <label  >SSC(2001) Reg. NO</label>
                                            <div  >
                                                <input type="text" name="sscRegNo" class="form-control" >
                                            </div>

                                            <label  >SSC(2001) Roll NO</label>
                                            <div  >
                                                <input type="text" name="sscRollNo" class="form-control">
                                            </div>

                                            <label  >GRA 5</label>
                                            <div  >

                                                <input type="checkbox" name="gpa" value="5">
                                            </div>


                                            <label  >Present Address</label>
                                            <div  >
                                                <input type="text" name="presentAddress" class="form-control" >
                                            </div>


                                            <label  >Permanent Address</label>
                                            <div  >
                                                <input type="text" name="permanentAddress" class="form-control" >
                                            </div>


                                            <label  >Occupation</label>
                                            <div  >
                                                <input type="text" name="occupation" class="form-control" >
                                            </div>


                                            <label  >Current Name Of Business/Working Organisation</label>
                                            <div  >
                                                <input type="text" name="currentBusinessOrWorkingOrg" class="form-control" >
                                            </div>


                                            <label  >Expertise</label>
                                            <div  >
                                                <input type="text" name="expertise" class="form-control" >
                                            </div>


                                            <label  >Mobile Number</label>
                                            <div  >
                                                <input type="text" name="mobileNumber" class="form-control" >
                                            </div>
                                        </div>

                                            <label  >Self Description</label>
                                            <div  >
                                                <input type="text" name="selfDescription" class="form-control" >
                                            </div>


                                            <label  >Blood Group</label>
                                            <div  >
                                                <input type="text" name="bloodGroup" class="form-control" >
                                            </div>


                                            <div  >
                                                <label  >Board</label>
                                                <select name="board">
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="mercedes">Mercedes</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>


                                            <label  >Police Station </label>
                                            <div  >
                                                <input type="text" name="policeStation" class="form-control" >
                                            </div>


                                            <label  >District </label>
                                            <div  >
                                                <input type="text" name="district" class="form-control" >
                                            </div>

                                            <label  >Designation </label>
                                            <div  >
                                                <input type="text" name="designation" class="form-control" >
                                            </div>

                                            <label  >FB ID name </label>
                                            <div  >
                                                <input type="text" name="fbIdName" class="form-control" >
                                            </div>

                                            <label  >Interest </label>
                                            <div  >
                                                <input type="text" name="interest" class="form-control" >
                                            </div>

                                        <button type="submit" >Submit</button>
                                    </form>
