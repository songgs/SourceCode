<%@ Page Title="Home Page" Language="C#" AutoEventWireup="true" CodeBehind="Default2.aspx.cs" Inherits="aspOutOfCache._Default2" %>

<%@ OutputCache Duration="10" VaryByParam="none" Location="Client" %>
<br />
<br />
<br />
<% string t = DateTime.Now.ToString(); Response.Write(t); %> 

