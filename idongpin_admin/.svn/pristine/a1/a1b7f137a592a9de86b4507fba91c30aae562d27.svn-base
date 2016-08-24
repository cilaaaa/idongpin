<div style="text-align:center;">
    <nav>
        <ul class="pagination">
            <li>
                @if(isset($_GET['page']))
                    <a href="{{($_GET['page'])==1?str_replace('page='.$_GET['page'],'page=1',
		               $_SERVER['REQUEST_URI']):str_replace('page='.$_GET['page'],'page='.($_GET['page']-1),$_SERVER['REQUEST_URI'])}}" aria-label="Previous" onclick="showLoading();">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                @else
                    <a href="{{str_contains($_SERVER['REQUEST_URI'],'?')?$_SERVER['REQUEST_URI'].'&page=1':$_SERVER['REQUEST_URI'].'?page=1'}}" aria-label="Previous" onclick="showLoading();">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                @endif
            </li>
            @for($i=1;$i<=$page_number;$i++)
                <li><a href="{{isset($_GET['page'])?str_replace('page='.$_GET['page'],'page='.$i,
				            $_SERVER['REQUEST_URI']):(str_contains($_SERVER['REQUEST_URI'],'?')?$_SERVER['REQUEST_URI'].'&page='.$i:$_SERVER['REQUEST_URI'].'?page='.$i)}}" onclick="showLoading();">{{$i}}</a></li>
            @endfor
            <li>
                @if(isset($_GET['page']))
                    <a href="{{($_GET['page'])==$page_number?$_SERVER['REQUEST_URI']:str_replace('page='.$_GET['page'],'page='.($_GET['page']+1),$_SERVER['REQUEST_URI'])}}" aria-label="Previous" onclick="showLoading();">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                @else
                    <a href="{{str_contains($_SERVER['REQUEST_URI'],'?')?$_SERVER['REQUEST_URI'].'&page=1':$_SERVER['REQUEST_URI'].'?page=1'}}}}" aria-label="Previous" onclick="showLoading();">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                @endif
            </li>
        </ul>
    </nav>
</div>