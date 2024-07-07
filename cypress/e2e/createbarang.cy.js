describe('template spec', () => {
  it('passes', () => {
    cy.visit('http://127.0.0.1:8000/databarang')
    Cypress.on('uncaught:exception', (err, runnable) => {
      // returning false here prevents Cypress from
      // failing the test
      return false
    })
    cy.contains('Tambah Barang').click()
    cy.get('#namaBarang').type('Thingpad')
    cy.get('#id_klasifikasi').select('1')
    cy.get('#stokBarang').type('3')
    cy.get('#hargaBarang').type('Rp. 30.000.000')
    cy.contains('Tambah Barang').click({force: true})
  })
})