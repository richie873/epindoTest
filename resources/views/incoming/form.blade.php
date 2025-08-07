<div class="form-group">
    <label>Nama Bahan</label>
    <input type="text" name="material_name" class="form-control" value="{{ old('material_name', $incoming->material_name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Jenis Bahan</label>
    <input type="text" name="material_type" class="form-control" value="{{ old('material_type', $incoming->material_type ?? '') }}" required>
</div>

<div class="form-group">
    <label>Satuan</label>
    <input type="text" name="unit" class="form-control" value="{{ old('unit', $incoming->unit ?? 'kg') }}" required>
</div>

<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $incoming->quantity ?? '') }}" required>
</div>

<div class="form-group">
    <label>Tanggal Diterima</label>
    <input type="date" name="received_date" class="form-control" value="{{ old('received_date', $incoming->received_date ?? '') }}" required>
</div>

<div class="form-group">
    <label>Diterima Oleh</label>
    <input type="text" name="received_by" class="form-control" value="{{ old('received_by', $incoming->received_by ?? '') }}" required>
</div>
