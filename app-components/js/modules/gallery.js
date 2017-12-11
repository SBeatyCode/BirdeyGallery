$(document).ready(function() {
//set event listeners for each filter to listen for clicks, and to send an AJAX call
    $('#watercolor').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {watercolor: 'Watercolor'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#painting').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {painting: 'Painting'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#pencil').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {pencil: 'Pencil'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#pen_ink').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {pen_ink: 'Pen/Ink'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#digital').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {digital: 'Digital'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#pixel_art').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {pixel_art: 'Pixel Art'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#photography').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {photography: 'Photography'},
            cache: false
        })
        .done(function(data) {
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
    
    $('#other').click( function() {
        $.ajax({
            method: "POST",
            url: "gallery-action.php",
            data: {other: 'Other'},
            cache: false
        })
        .done(function(data) {
            console.log('Other clicked');
            $('#galleryMain').remove();
            $('#galleryContainer').append(data);
        })
        .fail(function(data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        })
    });
});