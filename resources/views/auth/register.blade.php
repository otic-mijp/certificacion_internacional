@extends('layouts.auth')

@section('content')
<div class="w-full flex items-center justify-center  bg-gray-50/50">
    <div class="w-full max-w-6xl bg-white shadow-xl border border-slate-200 rounded-3xl overflow-hidden">
        
        <div class="bg-[#233C7E] px-10 py-6 border-b border-slate-100 flex justify-between items-center">
            <div>
                <h1 class="text-lg font-black text-white uppercase tracking-tighter">Registro de Cuenta Única</h1>
                <p class="text-[11px] text-blue-100 uppercase font-bold tracking-[0.2em] opacity-80">Formulario de registro</p>
            </div>
            <a href="{{ route('login') }}" class="text-xs font-black text-white hover:text-blue-100 transition-colors uppercase tracking-widest border-b border-white/20 pb-1">
                Ya tengo cuenta
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}" class="p-10 md:p-12 space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1">
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Cédula</label>
                    <div class="flex items-center border-b-2 border-slate-200 focus-within:border-cyan-500 transition-all py-1">
                        <select name="tipo_cedula" class="text-sm font-bold bg-transparent outline-none cursor-pointer">
                            <option>V</option>
                            <option>E</option>
                        </select>
                        <input type="text" name="cedula" placeholder="12345678" class="w-full pl-3 py-2 text-sm outline-none font-semibold text-slate-700">
                        <button type="button" id="btn-buscar-cedula" class="text-slate-400 hover:text-cyan-600 cursor-pointer p-1 transition-transform hover:scale-110">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="col-span-1">
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Correo Electrónico</label>
                    <input type="email" name="email" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 transition-all text-slate-700 font-medium">
                </div>
                <div class="col-span-1">
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Confirmar Correo</label>
                    <input type="email" name="email_confirmation" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 transition-all text-slate-700 font-medium">
                </div>
                <div class="col-span-1">
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Profesión / Oficio</label>
                    <select name="profesion" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 text-slate-700 font-medium cursor-pointer">
                        <option value="">Seleccione</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-2">
                <div>
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 text-slate-700">
                </div>
                <div>
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Sexo</label>
                    <select name="sexo" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 text-slate-700 font-medium">
                        <option value="">Seleccione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div>
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Telf. Celular</label>
                    <input type="text" name="telefono_celular" placeholder="0412..." class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 text-slate-700">
                </div>
                <div>
                    <label class="text-[11px] font-black text-slate-500 uppercase ml-1 tracking-wider">Telf. Local</label>
                    <input type="text" name="telefono_local" placeholder="0212..." class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 text-slate-700">
                </div>
            </div>

            <div class="bg-slate-50/80 p-8 rounded-3xl border border-slate-100">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">País</label>
                        <select name="pais" class="w-full bg-transparent border-b border-slate-300 py-2 text-sm outline-none focus:border-cyan-500 text-slate-700 font-bold">
                            <option>Venezuela</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Estado</label>
                        <select name="estado" class="w-full bg-transparent border-b border-slate-300 py-2 text-sm outline-none focus:border-cyan-500 text-slate-700">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Municipio</label>
                        <select name="municipio" class="w-full bg-transparent border-b border-slate-300 py-2 text-sm outline-none focus:border-cyan-500 text-slate-700">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Parroquia</label>
                        <select name="parroquia" class="w-full bg-transparent border-b border-slate-300 py-2 text-sm outline-none focus:border-cyan-500 text-slate-700">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Dirección Detallada (Calle, Edificio, Nro de Casa)</label>
                    <input type="text" name="direccion" class="w-full bg-transparent border-b border-slate-300 py-3 text-sm outline-none focus:border-cyan-500 text-slate-700">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 pt-2">
                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="text-[11px] font-black text-slate-500 uppercase tracking-wider">Contraseña</label>
                            <input type="password" name="password" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 transition-all">
                        </div>
                        <div>
                            <label class="text-[11px] font-black text-slate-500 uppercase tracking-wider">Repetir Clave</label>
                            <input type="password" name="password_confirmation" class="w-full border-b-2 border-slate-200 py-3 text-sm outline-none focus:border-cyan-500 transition-all">
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-1 bg-red-500 rounded-full"></span>
                        <p class="text-[10px] text-red-500 font-bold leading-tight uppercase tracking-tight">Mínimo 8 caracteres (Letras, números y símbolos)</p>
                    </div>
                </div>

                <div class="flex items-center gap-6 bg-blue-50/50 p-5 rounded-2xl border border-blue-100">
                    <div class="bg-white px-5 py-3 rounded-xl border-2 border-blue-200 text-xl font-serif italic tracking-[0.4em] text-slate-400 select-none shadow-sm">
                        KYZLWT
                    </div>
                    <div class="flex-1">
                        <label class="text-[10px] font-black text-blue-800 uppercase tracking-widest">Código de Verificación</label>
                        <input type="text" name="captcha" class="w-full bg-transparent border-b-2 border-blue-300 py-2 text-lg outline-none focus:border-blue-600 text-center font-black tracking-[0.5em] text-slate-700">
                    </div>
                </div>
            </div>

            <div class="flex justify-center pt-6">
                <button type="submit" class="w-full cursor-pointer md:w-2/3 py-5 bg-slate-900 hover:bg-[#233C7E] text-white text-xs font-black uppercase tracking-[0.3em] rounded-2xl transition-all shadow-2xl hover:shadow-blue-500/20 active:scale-[0.98]">
                    Finalizar Registro e Ingresar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection