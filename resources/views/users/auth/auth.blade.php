@extends('auth.index')

@section('title', 'Users Login')

@section('form-action', route('users.auth.login'))

@section('register', route('users.auth.register'))

@section('password', route('users.password.reset'))
