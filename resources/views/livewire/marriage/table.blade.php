<div>
<div class="card-body pb-0">
                  <h5 class="card-title">Members <span>| Today</span></h5>

                  <table class="table table-borderless datatable" wire:poll.20s>
                    <thead>
                      <tr>
                        <th scope="col">s/n</th>
                        <th scope="col">Husband</th>
                        <th scope="col">Wife</th>
                        <th scope="col">Date</th>
                        
                      </tr>
                    </thead>
                    <tbody >
                        @foreach($marriages as $key => $marriage)
                      <tr>
                        <td>{{$marriage->husband_id}}</td>
                        <td>{{$marriage->wife_id}}</td>
                        <td>{{$marriage->marriage_date}}</td>
                        
                        
                        <td>
                        <div class="d-flex">
                        <a href="" class="btn btn-primary me-2">Edit</a>
                             <form action="" method="post">
                                
                                
                                <button type="submit" class="btn btn-danger">Delete</button>
                             </form>   
                      
                        </td>
                        </div>
                      </tr>
                      
                            <tr>
                                <td colspan="4" class="text-center">No members found.</td>
                            </tr>
                      @endforeach
                      
                       
                      
                    </tbody>
                  </table>

                </div>                       </div>
                      </div>
</div>
