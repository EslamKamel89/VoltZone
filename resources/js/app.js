let showToast = (event) => {
    Toastify({
        text: event[0].message ?? "Success",
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "bottom",
        position: "right",
        style: {
            background: "linear-gradient(to right, #fe5725, #b13717)",
        },
        // avatar: "https://img.icons8.com/ios-filled/50/000000/checkmark.png",
        stopOnFocus: true,
    }).showToast();
};

Livewire.on("show-toast", showToast);
