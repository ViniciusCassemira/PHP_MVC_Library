import { english, portuguese } from "./text.js";

function getLanguage() {
    return localStorage.getItem('language') || 'english';
}

function toggleLanguage() {
    let currentLanguage = localStorage.getItem('language');
    let newLanguage = (currentLanguage === 'portuguese') ? 'english' : 'portuguese';
    localStorage.setItem('language', newLanguage);
    location.reload();
}

document.getElementById('button_language').addEventListener('click', toggleLanguage);

document.addEventListener("DOMContentLoaded", () => {

    let language = getLanguage() === "portuguese" ? portuguese : english;

    const updateTextContent = (id, text) => {
        const element = document.getElementById(id);
        if (element){
            element.textContent = text;
        }
    };

    const updateClass = (className, text) => {
        const elements = document.getElementsByClassName(className);
        for (let element of elements) {
            element.textContent = text;
        }
    };

    const updatePlaceholder = (id, text) => {
        const element = document.getElementById(id);
        if (element){
            element.placeholder = text;
        }
    };

    // Footer
    updateTextContent("footerText", language.footer.text);

    // Header
    updateTextContent("header_login", language.header.login);
    updateTextContent("header_books", language.header.books);
    updateTextContent("header_logout", language.header.logout);
    updateTextContent("header_bookings", language.header.bookings);
    updateTextContent("header_users", language.header.users);

    // Dashboard
    updateTextContent("dashboard_welcome", language.dashboard.welcome);
    updateTextContent("dashboard_title", language.dashboard.title);
    updateTextContent("dashboard_message", language.dashboard.message);

    // Login
    updateTextContent("login_title", language.login.title);
    updatePlaceholder("login_email", language.login.email);
    updatePlaceholder("login_password", language.login.password);
    updateTextContent("login_button", language.login.button);
    updateTextContent("login_message", language.login.message);
    updateTextContent("login_link", language.login.link);
    
    // Genre
    updateTextContent("genres_title", language.genres.title);
    updateTextContent("genres_genre_button", language.genres.genre_button);
    updateTextContent("genres_description_table", language.genres.description_table);
    updateTextContent("genres_book_table", language.genres.book_table);
    updateTextContent("genres_action_table", language.genres.action_table);
    updateClass("genres_delete_button", language.genres.delete_button);
    
    // Register
    updateTextContent("register_title", language.register.title);
    updateTextContent("register_email", language.register.email);
    updatePlaceholder("register_name", language.register.name);
    updatePlaceholder("register_password", language.register.password);
    updateTextContent("register_button", language.register.button);
    updateTextContent("register_message", language.register.message);
    updateTextContent("register_link", language.register.link);
    
    // Book
    updateTextContent("books_title", language.books.title);
    updateTextContent("books_title_table", language.books.title_table);
    updateTextContent("books_code_table", language.books.code_table);
    updateTextContent("books_genre_table", language.books.genre_table);
    updateTextContent("books_available_table", language.books.available_table);
    updateTextContent("books_status_table", language.books.status_table);
    updateTextContent("books_action_table", language.books.action_table);
    updateClass("books_edit_button", language.books.edit_button);
    updateTextContent("books_book_button", language.books.book_button);
    updateTextContent("books_genre_button", language.books.genre_button);

    // Booking
    updateTextContent("bookings_title", language.bookings.title);
    updateTextContent("bookings_book_table", language.bookings.book_table);
    updateTextContent("bookings_start_table", language.bookings.start_table);
    updateTextContent("bookings_return_table", language.bookings.return_table);
    updateTextContent("bookings_status_table", language.bookings.status_table);
    updateTextContent("bookings_user_table", language.bookings.user_table);
    updateTextContent("bookings_action_table", language.bookings.action_table);
    updateTextContent("bookings_return_button", language.bookings.return_button);
    updateTextContent("bookings_booking_button", language.bookings.booking_button);
    
    // User manager
    updateTextContent("user_manager_title", language.user_manager.title);
    updateTextContent("user_manager_name_table", language.user_manager.name_table);
    updateTextContent("user_manager_email_table", language.user_manager.email_table);
    updateTextContent("user_manager_role_table", language.user_manager.role_table);
    updateTextContent("user_manager_status_table", language.user_manager.status_table);
    updateTextContent("user_manager_action_table", language.user_manager.action_table);
    // updateClass("user_manager_active_button", language.user_manager.active_button);
    // updateClass("user_manager_role_button", language.user_manager.role_button);

    // Book form
    updateTextContent("book_form_title", language.book_form.title);
    updatePlaceholder("book_form_name", language.book_form.name);
    updatePlaceholder("book_form_code", language.book_form.code);
    updateTextContent("book_form_genre", language.book_form.genre);
    updateTextContent("book_form_button", language.book_form.button);

    // Genre form
    updateTextContent("genre_form_title", language.genre_form.title);
    updatePlaceholder("genre_form_name", language.genre_form.name);
    updateTextContent("genre_form_button", language.genre_form.button);
    
    // Booking form
    updateTextContent("booking_form_title", language.booking_form.title);
    updateTextContent("booking_form_name", language.booking_form.name);
    updateTextContent("booking_form_button", language.booking_form.button);

    // Book manager
    updateTextContent("book_manager_title", language.book_manager.title);
    updateTextContent("book_manager_name", language.book_manager.name);
    updateTextContent("book_manager_code", language.book_manager.code);
    updateTextContent("book_manager_genre", language.book_manager.genre);
    updateTextContent("book_manager_update_button", language.book_manager.update_button);
    updateTextContent("book_manager_back_button", language.book_manager.back_button);
    updateClass("book_manager_active_button", language.book_manager.active_button);
    updateClass("book_manager_inactive_button", language.book_manager.inactive_button);
    updateClass("book_manager_delete_button", language.book_manager.delete_button);
    
    // 404
    updateTextContent("404_button", language.notFound);

});