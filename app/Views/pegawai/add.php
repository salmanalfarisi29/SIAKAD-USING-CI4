<tr align="center">
            <td colspan="5">
            
                <form action="/pegawai/save" method="post">        
                    <table>
                        <tr>
                            <td colspan="2">                                
                                <?php if(session()->getFlashdata('msg')):?>
                                    <label style="color: red;"> <?= session()->getFlashdata('msg') ?> </label>
                                <?php endif;?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nip</td>
                            <td><input type="number" name="nip" required value="<?= old('nip') ?>"></td>                 
                        </tr>   
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama" required value="<?= old('nama') ?>"></td>                    
                        </tr>   
                        <tr>
                            <td>Gender</td>
                            <td>
                                <?php if(old('gender') == 'Pria') :?>
                                    <input type="radio" name="gender" value="Pria" checked> Pria
                                <?php else:?>
                                    <input type="radio" name="gender" value="Pria"> Pria
                                <?php endif?>
                                <?php if(old('gender') == 'Wanita') :?>
                                    <input type="radio" name="gender" value="Wanita"checked> Wanita
                                <?php else:?>
                                    <input type="radio" name="gender" value="Wanita"> Wanita
                                <?php endif?>
                            </td>                  
                        </tr>  
                        <tr>
                            <td>Telepon</td>
                            <td><input type="number" name="telepon" required value="<?= old('telepon') ?>"></td>                  
                        </tr> 
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" required value="<?= old('email') ?>"></td>                  
                        </tr> 
                        <tr>
                            <td>Pendidikan</td>
                            <td>
                                <select name="pendidikan" required>
                                    <option value="">-- Pilih Pendidikan -- </option>
                                    <?php if(old('gender') == 'Pria') :?>
                                        <option value="SD" selected>SD</option>
                                    <?php else:?>
                                        <option value="SD">SD</option>
                                    <?php endif?>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                </select>
                            </td>                  
                        </tr>  
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Simpan"></td>                   
                        </tr>               
                    </table>
                </form>
                
            </td>
        </tr>