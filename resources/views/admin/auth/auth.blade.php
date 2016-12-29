@extends('auth.index')

@section('title', 'Super Admin')

@section('form-action', route('admin.auth.login'))

@section('register', route('admin.auth.register'))

@section('password', route('admin.password.reset'))
