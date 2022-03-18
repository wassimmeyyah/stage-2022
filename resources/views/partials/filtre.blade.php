<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<form action="{{route('goEtablissmementFiltre')}}" class=" d-flex mr-3">
    <div class="form-group mr-3 d-flex justify-content-end p-2" >
        <label for="filtreType" >Filtrer par région </label>
        <select id="filtreType" wire:model="filtreType" style="min-width:110px;">
            <option name="q" class="form-control" value="{{request()->q ?? ''}}"></option>
            <option name="q" class="form-control" value="{{request()->q ?? 'RHO'}}">RHO</option>
            <option name="q" class="form-control" value="{{request()->q ?? 'LOI'}}">LOI</option>
            <option name="q" class="form-control" value="{{request()->q ?? 'AIN'}}">AIN</option>
        </select>

    </div>
    <div class="form-group mr-3 d-flex justify-content-end p-2" >
        <label for="filtreRegion">Filtrer par type </label>
        <select id="filtreRegion" wire:model="filtreRegion" style="min-width:110px;">
            <option name="p" class="form-control" value="{{request()->p ?? ''}}"></option>
            <option name="p" class="form-control" value="{{request()->p ?? 'ECL'}}">ECL</option>
            <option name="p" class="form-control" value="{{request()->p ?? 'CLG'}}">CLG</option>
            <option name="p" class="form-control" value="{{request()->p ?? 'LYC'}}">LYC</option>
        </select>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary"><i class="bi bi-funnel"></i></button>
    </div>
</form>
