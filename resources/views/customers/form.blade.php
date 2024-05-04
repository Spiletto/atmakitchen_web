<div class="form-group">
    <label for="nama">Name</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $customer->nama ?? '') }}" required>
</div>
<div class="form-group">
    <label for="no_telepon">Phone Number</label>
    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $customer->no_telepon ?? '') }}" required>
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $customer->username ?? '') }}" required>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $customer->email ?? '') }}" required>
</div>
<div class="form-group">
    <label for="saldo">Balance</label>
    <input type="number" class="form-control" id="saldo" name="saldo" value="{{ old('saldo', $customer->saldo ?? '') }}" required>
</div>
<div class="form-group">
    <label for="poin">Points</label>
    <input type="number" class="form-control" id="poin" name="poin" value="{{ old('poin', $customer->poin ?? '') }}" required>
</div>
