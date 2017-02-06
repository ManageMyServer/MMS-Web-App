<h2 class="text-center">Edit Server <small>The Vanilla Server</small></h2>
<div class="row">
<div class="col-xs-3">
<div class="btn-group-vertical">
   <a href="server" class="btn btn-raised btn-primary">Overview</a>
   <a href="console" class="btn btn-raised btn-primary">Console</a>
   <a href="ftp" class="btn btn-raised btn-primary">FTP</a>
   <a href="mysql" class="btn btn-raised btn-primary">MySQL</a>
   <a class="btn btn-raised"></a>
   <a href="" class="btn btn-raised btn-warning">Suspend Server</a>
   <a href="" class="btn btn-raised btn-danger">Delete Server</a>
</div>
</div>
<div class="col-xs-9">

<div class="btn-group btn-group-justified">
   <a href="" class="btn btn-raised btn-primary">Start</a>
   <a href="" class="btn btn-raised btn-primary">Stop</a>
   <a href="" class="btn btn-raised btn-primary">Restart</a>
   <a href="" class="btn btn-raised btn-primary">Kill</a>
</div>
<div class="form-group">
   <input disabled type="text" class="form-control" placeholder="Server Status" value="Online (9/25)">

   <label class="control-label">Server Name</label>
   <input type="text" class="form-control" placeholder="My Minecraft Server" value="The Vanilla Server">
</div>

   <label class="control-label">Player Amount</label>
   <input type="text" class="form-control" placeholder="20" value="25">

   <label class="control-label">Select Avalible Node <small>&bull; You can only move servers to nodes that are online and you have permission to the node and action.</small></label>
   <select class="form-control" id="select">
      <option selected>Local</option>
      <option disabled>USA/Node1</option>
      <option disabled>USA/Node2</option>
      <option disabled>USA/Node3</option>
      <option>USA/Node4</option>
      <option disabled>FRANCE/Node1</option>
      <option>FRANCE/Node2</option>
      <option>FRANCE/Dedicated1</option>
   </select>

   <label class="control-label">IP <small>&bull; Moving a server to a different node changes the IP.</small></label>
   <input disabled type="text" class="form-control" placeholder="12.34.567.89" value="57.33.124.37">

   <label class="control-label">Select Avalible Port for Local <small>&bull; The ports listed are currently available on the node or being used by this server.</small></label>
   <select class="form-control" id="select">
      <option>25565</option>
      <option selected>25693</option>
   </select>

   <label class="control-label">Select one of your templates.</label>
   <select class="form-control" id="select">
      <option selected>None</option>
      <option>CastleBuild</option>
      <option>TNTWars</option>
   </select>

   <label class="control-label">User <small>&bull; Give the following user full access to this server.</small></label>
   <input type="text" class="form-control" placeholder="Username" value="admin">

<div class="btn-group" role="group">
   <a href=""><button type="button" class="btn btn-primary">Submit Changes</button></a>
</div>
</div>
</div>
