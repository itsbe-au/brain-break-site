document.addEventListener("alpine:init", () => {
  Alpine.store("wheel", {
    game: null,
    selectedItem: null,
    isSpinning: false,
    showResultModal: false,

    closeModal() {
      this.showResultModal = false;
      this.selectedItem = null;
    }
  });
});