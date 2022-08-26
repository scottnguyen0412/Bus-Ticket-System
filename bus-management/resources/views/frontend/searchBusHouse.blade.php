    <form action="{{route('frontend.schedules')}}" method="GET">
		@csrf
        <div class="input-group">
        <div class="form-outline">
        <input type="search" name="bus_name" id="bus_name" value="{{request()->input('bus_name')}}" class="form-control form-control-sm rounded" placeholder="Search bus house..."/>
        </div>
        </div><br/>
        <div class="form-check">
    </form>