@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
   <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">		   
			   
				<script type="text/javascript">//<![CDATA[ 
					(function() {
						var configuration = {
						"token": "024e24a7457f28ec81da3ebeaf1894f2",
						"domains": [
							"dreamploy.com"
						],
						"capping": {
							"limit": 5,
							"timeout": 24
						},
						"entryScript": {
							"type": "timeout",
							"timeout": 3000,
							"capping": {
								"limit": 5,
								"timeout": 24
							}
						},
						"exitScript": {
							"enabled": true
						},
						"popUnder": {
							"enabled": true
						}
					};
						var script = document.createElement('script');
						script.async = true;
						script.src = '//cdn.shorte.st/link-converter.min.js';
						script.onload = script.onreadystatechange = function () {var rs = this.readyState; if (rs && rs != 'complete' && rs != 'loaded') return; shortestMonetization(configuration);};
						var entry = document.getElementsByTagName('script')[0];
						entry.parentNode.insertBefore(script, entry);
					})();
					//]]></script>

            </div>			
          </div>
        </div>
	<br>
		
@endsection