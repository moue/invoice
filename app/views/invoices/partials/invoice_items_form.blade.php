		        <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Size and brief description of ad</th>
                                    <th colspan="5">Issue Number</th>
                                    <th>Cost of Ad</th>
                                    <th>Charges/Discounts</th>
                                    <th>Total Cost</th>
                                </tr>                                    
                            </thead>
                            <tbody>
                                <tr style="text-align:center;">
                                    <td style="text-align:left;">{{ Form::select('size_options', $size_options, null, array('class'=>'form-control')) }}</td>
                                    <td style="text-align:left;">{{ Form::file('image') }}</td>
                                    <td>{{ Form::checkbox('1') }}
							    	{{ Form::label('issue_options', '1', array('class'=>'checkspace')) }}</td>
                                    <td>{{ Form::checkbox('1') }}
							    	{{ Form::label('issue_options', '1', array('class'=>'checkspace')) }}</td>
                                    <td>{{ Form::checkbox('1') }}
							    	{{ Form::label('issue_options', '1', array('class'=>'checkspace')) }}</td>
                                    <td>{{ Form::checkbox('1') }}
							    	{{ Form::label('issue_options', '1', array('class'=>'checkspace')) }}</td>
                                    <td>{{ Form::checkbox('1') }}
							    	{{ Form::label('issue_options', '1', array('class'=>'checkspace')) }}</td>
                                    <td>{{ Form::label('subcost', 'Cost') }}</td>
                                    <td>{{ Form::label('subcost', 'Cost') }}</td>
                                    <td>{{ Form::label('subcost', 'Cost') }}</td>

                                </tr>
                            </tbody>
                        </table>                            
                    </div><!-- /.col -->
                </div><!-- /.row -->