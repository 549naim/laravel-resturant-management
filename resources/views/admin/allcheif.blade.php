<div  style="margin-top: 80px; right:50px">
    <table  class="table table-dark" >
        <tbody>
         
          <tr>
            <th class="table-active">name</th>
            <th >email</th>
            <th class="table-active">phone</th>
            <th>Guest</th>
            <th>Action</th>
            <th> Action 2</th>
          
          </tr>
          @foreach ($data as $item)
          <tr>
            <td  class="table-active">{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td  class="table-active">{{$item->speciality}}</td>
            <td><img src="/cheifimage/{{$item->image}}" alt="food"></td>
            <td><a href="{{url('/deletecheif',$item->id)}}">Delete</a></td>
            <td><a href="{{url('/updatecheif',$item->id)}}">update</a></td>
            
                      
          </tr>
          @endforeach
        </tbody>
      </table>
</div>